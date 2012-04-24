<?php

namespace Projet\CoursBundle\Controller;

use Projet\CoursBundle\Entity\Devoir;

use Projet\CoursBundle\Entity\Document;
use Projet\CoursBundle\Form\DocumentType;

use Projet\CoursBundle\Entity\Notification;

use Projet\UserBundle\Entity\Etudiant;
use Projet\UserBundle\Entity\Promotion;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Enseignement;
use Projet\CoursBundle\Form\EnseignementType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Enseignement controller.
 *
 */
class EnseignementController extends Controller
{
	
	/**
	 * Liste des cours par rapport à un Utilisateur
	 *
	 */
	public function mesCoursAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		
		
		if($this->get('security.context')->isGranted('ROLE_ENSEIGNANT') )
		{
			$entities = $user->getEnseignements();
		}
		else 
			if($this->get('security.context')->isGranted('ROLE_USER') ) 
			{		
				$entities = $user->getPromotion()->getEnseignements();
			}
		
	
		
	
		return $this->render('ProjetCoursBundle:Enseignement:index.html.twig', array(
	'entities' => $entities
	));
	}
	
	
	
	
	
	
    /**
     * Lists all Enseignement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Enseignement')->findAll();

        return $this->render('ProjetCoursBundle:Enseignement:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Enseignement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }

        $tps       = $em->getRepository('ProjetCoursBundle:Devoir')->findDevoirType($entity->getId(), 'TP');
        $tds       = $em->getRepository('ProjetCoursBundle:Devoir')->findDevoirType($entity->getId(), 'TD');
        $exercices = $em->getRepository('ProjetCoursBundle:Devoir')->findDevoirType($entity->getId(), 'Exercice');
        $projets   = $em->getRepository('ProjetCoursBundle:Devoir')->findDevoirType($entity->getId(), 'Projet');
        $autres    = $em->getRepository('ProjetCoursBundle:Devoir')->findDevoirTypeAutre($entity->getId());
        $documents = $entity->getDocuments(); 

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Enseignement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'tps'	      => $tps,
            'tds'	      => $tds,
            'exercices'	  => $exercices,
            'projets'	  => $projets,
            'autres'	  => $autres,
            'documents'	  => $documents,

        ));
    }

    /**
     * Displays a form to create a new Enseignement entity.
     *
     */
    public function newAction()
    {
    	
    	if(!$this->get('security.context')->isGranted('ROLE_ENSEIGNANT') )
    	{
    		throw $this->createNotFoundException('Vous n\'êtes pas autorisé à creer un cours !');
    	}
    	
        $entity = new Enseignement();
        $form   = $this->createForm(new EnseignementType(), $entity);

        return $this->render('ProjetCoursBundle:Enseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Enseignement entity.
     *
     */
    public function createAction()
    {
        $entity  = new Enseignement();
        $request = $this->getRequest();
        $form    = $this->createForm(new EnseignementType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$router = $this->get('router');
        	
        	
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$entity->setEnseignant($user);
        	
        	$em->persist($entity);
        	$em->flush();
        	
        	$uri_cours = $router->generate('enseignement_show', array('id' => $entity->getId()));
        	
        	$notif = new Notification();
        	$notif->setEnseignement($entity);
        	$notif->setNom(
        		'Vous êtes attribué à un nouveau cours : '.
        		'<a href="'.$uri_cours.'">'.$entity->getNom().'</a>'
        	);
        	$notif->setUser($user);
        	
        	
        	$em->persist($notif);
        	$em->flush();
            

            return $this->redirect($this->generateUrl('enseignement_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Enseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Enseignement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }

        $editForm = $this->createForm(new EnseignementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Enseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Enseignement entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }

        $editForm   = $this->createForm(new EnseignementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enseignement_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Enseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Enseignement entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enseignement'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    
    
}
