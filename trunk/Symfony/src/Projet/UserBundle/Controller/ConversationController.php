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
    public function newAction()
    {
        $entity = new Conversation();
        $form   = $this->createForm(new ConversationType(), $entity);

        return $this->render('ProjetUserBundle:Conversation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Conversation entity.
     *
     */
    public function createAction()
    {
        $entity  = new Conversation();
        $request = $this->getRequest();
        $form    = $this->createForm(new ConversationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conversation_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetUserBundle:Conversation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
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
