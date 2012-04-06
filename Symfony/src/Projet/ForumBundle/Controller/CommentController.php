<?php

namespace Projet\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\ForumBundle\Entity\Comment;
use Projet\ForumBundle\Form\CommentType;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{
    /**
     * Lists all Comment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetForumBundle:Comment')->findAll();

        return $this->render('ProjetForumBundle:Comment:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Comment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetForumBundle:Comment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Comment entity.
     *
     */
    public function newAction($id)
    {
        $entity = new Comment();
        $form   = $this->createForm(new CommentType(), $entity);

        return $this->render('ProjetForumBundle:Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Creates a new Comment entity.
     *
     */
    public function createAction($id)
    {
        $entity  = new Comment();
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	
        	$sujet = $em->getRepository('ProjetForumBundle:Sujet')->find($id);
        	
        	if (!$sujet) {
        		throw $this->createNotFoundException('Unable to find Sujet entity.');
        	}
        	
        	$sujet->addCommentaire($entity);
        	
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sujet_show', array('id' => $id)));
            
        }

        return $this->render('ProjetForumBundle:Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'     => $id
        ));
    }

    /**
     * Displays a form to edit an existing Comment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm = $this->createForm(new CommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetForumBundle:Comment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Comment entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetForumBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm   = $this->createForm(new CommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comment_edit', array('id' => $id)));
        }

        return $this->render('ProjetForumBundle:Comment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comment entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetForumBundle:Comment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comment'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
