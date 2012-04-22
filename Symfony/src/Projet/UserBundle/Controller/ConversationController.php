<?php

namespace Projet\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\UserBundle\Entity\Conversation;
use Projet\UserBundle\Form\ConversationType;

/**
 * Conversation controller.
 *
 */
class ConversationController extends Controller
{
	
	public function incomingAction($id_message)
	{
		// recuperation de l'utilisateur courant
		$user = $this->container->get('security.context')->getToken()->getUser();
	
		$em = $this->getDoctrine()->getEntityManager();
		$entities = $em->getRepository('ProjetUserBundle:Conversation')
						->findIncomingConversations($id_message, $user->getId());
		
		$em->getRepository('ProjetUserBundle:Message')
			->updateMessageConversations($id_message, $user->getId());
	
		return $this->render('ProjetUserBundle:Conversation:index.html.twig', array(
				'conversations' => $entities
	));
	
	}
	
	
	
	
    /**
     * Lists all Conversation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetUserBundle:Conversation')->findAll();

        return $this->render('ProjetUserBundle:Conversation:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Conversation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Conversation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conversation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:Conversation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Conversation entity.
     *
     */
    public function newAction($id)
    {
    	
    	
        $entity = new Conversation();
        $form   = $this->createForm(new ConversationType(), $entity);

        return $this->render('ProjetUserBundle:Conversation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Creates a new Conversation entity.
     *
     */
    public function createAction($id)
    {
        $entity  = new Conversation();
        $request = $this->getRequest();
        $form    = $this->createForm(new ConversationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$message = $em->getRepository('ProjetUserBundle:Message')->find($id);
        	if (!$message) { throw $this->createNotFoundException('Unable to find message entity.'); }        	
        	$entity->setMessage($message);
        	
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$entity->setUser($user);
        	
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_show', array('id' => $id)));
            
        }

        return $this->render('ProjetUserBundle:Message:show.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Displays a form to edit an existing Conversation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Conversation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conversation entity.');
        }

        $editForm = $this->createForm(new ConversationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:Conversation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Conversation entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:Conversation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conversation entity.');
        }

        $editForm   = $this->createForm(new ConversationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conversation_edit', array('id' => $id)));
        }

        return $this->render('ProjetUserBundle:Conversation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Conversation entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetUserBundle:Conversation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Conversation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('conversation'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
