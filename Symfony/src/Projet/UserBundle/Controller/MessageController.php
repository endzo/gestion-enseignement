<?php

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Entity\Boite;

use Projet\UserBundle\Entity\Conversation;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Projet\UserBundle\Entity\Message;
use Projet\UserBundle\Form\MessageType;
use Projet\UserBundle\Form\ConversationType;

/**
 * Message controller.
 *
 */
class MessageController extends Controller
{
	
	/**
	 * Lists all Message entities.
	 *
	 */
	public function indexEnvoyerAction()
	{
		// recuperation de l'utilisateur courant
		$user = $this->container->get('security.context')->getToken()->getUser();
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$entities = $em->getRepository('ProjetUserBundle:Message')->findBoiteEnvoi($user->getId());
	
		return $this->render('ProjetUserBundle:Message:index.html.twig', array(
	'entities' => $entities
	));
	}
	
	
	
	/**
	 * Lists all Message entities.
	 *
	 */
	public function indexRecuAction()
	{
		// recuperation de l'utilisateur courant
		$user = $this->container->get('security.context')->getToken()->getUser();
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$entities = $em->getRepository('ProjetUserBundle:Message')->findBoiteReception($user->getId());
	
		return $this->render('ProjetUserBundle:Message:index.html.twig', array(
	'entities' => $entities
	));
	}
	
	
	
	
	
	
	
	
    /**
     * Lists all Message entities.
     *
     */
    public function indexAction()
    {
    	// recuperation de l'utilisateur courant
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetUserBundle:Message')->findUserMessages($user->getId());

        return $this->render('ProjetUserBundle:Message:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Message entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        
        $conversations = $entity->getConversations();
        $form   = $this->createForm(new ConversationType(), new Conversation());
        
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:Message:show.html.twig', array(
            'entity'        => $entity,
            'conversations' => $conversations,
            'delete_form'   => $deleteForm->createView(),
            'form'          => $form->createview() 

        ));
    }

    /**
     * Displays a form to create a new Message entity.
     *
     */
    public function newAction()
    {
        $entity = new Message();
        $form   = $this->createForm(new MessageType(), $entity);

        return $this->render('ProjetUserBundle:Message:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'username'=> 'destinataire'
        ));
    }
    
    
    /**
     * Displays a form to create a new Message entity already set for a User.
     *
     */
    public function newToAction($username)
    {
    	  	
    	$entity = new Message();
    	$entity->setDestinataire($username);
    	$form   = $this->createForm(new MessageType(), $entity);
    
    	return $this->render('ProjetUserBundle:Message:new.html.twig', array(
		    'entity' => $entity,
		    'form'   => $form->createView()
		    ));
    }
    

    /**
     * Creates a new Message entity.
     *
     */
    public function createAction()
    {
        $entity  = new Message();
        
        $request = $this->getRequest();
        $form    = $this->createForm(new MessageType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$destinataire = $em->getRepository('ProjetUserBundle:User')->findOneByUsername($entity->getDestinataire());
        	if (!$destinataire) { throw $this->createNotFoundException('le destinataire n\'existe pas'); }
        	
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	
        	$boite = new Boite();
        	$boite->setTypeEnvoi("sender");
        	$boite->setUser($user);
        	$boite->setMessage($entity);
        	
        	
        	$boite1 = new Boite();
        	$boite1->setTypeEnvoi("receiver");
        	$boite1->setUser($destinataire);
        	$boite1->setMessage($entity);
        	
        	$entity->setUser($user);
        	
        	
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->persist($boite);
            $em->persist($boite1);
            $em->flush();

            return $this->redirect($this->generateUrl('message_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetUserBundle:Message:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Message entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $editForm = $this->createForm(new MessageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:Message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Message entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $editForm   = $this->createForm(new MessageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_edit', array('id' => $id)));
        }

        return $this->render('ProjetUserBundle:Message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Message entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetUserBundle:Message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Message entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('message'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
