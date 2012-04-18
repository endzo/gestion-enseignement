<?php

namespace Projet\ForumBundle\Controller;

use Projet\CoursBundle\Entity\Notification;

use Symfony\Component\Validator\Constraints\Collection;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\ForumBundle\Entity\Sujet;
use Projet\ForumBundle\Form\SujetType;
use Projet\ForumBundle\Entity\Comment;
use Projet\ForumBundle\Form\CommentType;
/**
 * Sujet controller.
 *
 */
class SujetController extends Controller
{
	/**
	 * Liste de tous les sujet concernant l'utilisateur
	 *
	 */
	public function monForumAction()
	{
		// recuperation de l'utilisateur courant
		$user = $this->container->get('security.context')->getToken()->getUser();
		
		// test du Role de l'utilisateur
		if($this->get('security.context')->isGranted('ROLE_ENSEIGNANT') )
		{
			$courss = $user->getEnseignements();
		}
		else
		if($this->get('security.context')->isGranted('ROLE_USER') )
		{
			$courss = $user->getPromotion()->getEnseignements();
		}
		
		
		foreach ($courss as $cours) {
			$sujets = $cours->getSujets();
			foreach ($sujets as $sujet) {
				$entities[] = $sujet;
			}
			
			
		}
	
		return $this->render('ProjetForumBundle:Sujet:index.html.twig', array(
	'entities' => $entities
	));
	}
	
	
	
	
	
	
    /**
     * Lists all Sujet entities.
     *
     */
    public function indexAction($id)
    {
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$cours = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);
    	
    	if (!$cours) {
    		throw $this->createNotFoundException('impossible de trouver le Cours');
    	}
    	
        

        $entities =$cours->getSujets();

        return $this->render('ProjetForumBundle:Sujet:index.html.twig', array(
        		'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Sujet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Sujet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sujet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        
        $comment = new Comment();
        $form   = $this->createForm(new CommentType(), $comment);
        
        
        $commentaires = $entity->getCommentaires();
        
        

        return $this->render('ProjetForumBundle:Sujet:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'form'        => $form->createView(),
            'commentaires'=> $commentaires 

        ));
    }

    /**
     * Displays a form to create a new Sujet entity.
     *
     */
    public function newAction($id)
    {
        $entity = new Sujet();
        $form   = $this->createForm(new SujetType(), $entity);

        return $this->render('ProjetForumBundle:Sujet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Creates a new Sujet entity.
     *
     */
    public function createAction($id)
    {
        $entity  = new Sujet();
        $request = $this->getRequest();
        $form    = $this->createForm(new SujetType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	$em = $this->getDoctrine()->getEntityManager();
        	$cours = $em->getRepository('ProjetCoursBundle:enseignement')->find($id);
        	$cours->addSujet($entity);
        	
        	$router = $this->get('router');
        	$uri_sujet = $router->generate('sujet_show'       , array('id' => $entity->getId()));
        	$uri_cours = $router->generate('enseignement_show', array('id' => $cours->getId()));
        	
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	
        	$notif = new Notification();
        	$notif->setEnseignement($cours);
        	$notif->setNom(
        			$user->getUsername().
        			" a créé un nouveau sujet : ".
        			'<a href="'.$uri_sujet.'">'.
        			$entity->getNom().'</a>'.
        			' dans le forum du cours : '.
        			'<a href="'.$uri_cours.'">'.
        			$cours->getNom().
        			'</a>'
        	);
        	$notif->setUser($user);

        	
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->persist($notif);
            $em->flush();

            return $this->redirect($this->generateUrl('sujet_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetForumBundle:Sujet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Displays a form to edit an existing Sujet entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Sujet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sujet entity.');
        }

        $editForm = $this->createForm(new SujetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetForumBundle:Sujet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Sujet entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Sujet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sujet entity.');
        }

        $editForm   = $this->createForm(new SujetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sujet_edit', array('id' => $id)));
        }

        return $this->render('ProjetForumBundle:Sujet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sujet entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetForumBundle:Sujet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sujet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sujet'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
