<?php

namespace Amine\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Amine\ForumBundle\Entity\Subject;
use Amine\ForumBundle\Form\SubjectType;

/**
 * Subject controller.
 *
 */
class SubjectController extends Controller
{
    /**
     * Lists all Subject entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('AmineForumBundle:Subject')->findAll();

        return $this->render('AmineForumBundle:Subject:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Subject entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AmineForumBundle:Subject')->find($id);

        if (!$entity) 
		{
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }
		// recuperation des commontaires
		$comments = $entity->getComments();
		$user = $entity->getUser();

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmineForumBundle:Subject:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
			'comments'    => $comments,
			'user'		  => $user
        ));
    }

    /**
     * Displays a form to create a new Subject entity.
     *
     */
    public function newAction()
    {
        $entity = new Subject();
        $form   = $this->createForm(new SubjectType(), $entity);

        return $this->render('AmineForumBundle:Subject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Subject entity.
     *
     */
    public function createAction()
    {
        $entity  = new Subject();
        $request = $this->getRequest();
        $form    = $this->createForm(new SubjectType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subject_show', array('id' => $entity->getId())));
            
        }

        return $this->render('AmineForumBundle:Subject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Subject entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AmineForumBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $editForm = $this->createForm(new SubjectType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmineForumBundle:Subject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Subject entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('AmineForumBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $editForm   = $this->createForm(new SubjectType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subject_edit', array('id' => $id)));
        }

        return $this->render('AmineForumBundle:Subject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Subject entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('AmineForumBundle:Subject')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subject entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subject'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
