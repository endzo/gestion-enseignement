<?php

namespace Projet\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Type;
use Projet\CoursBundle\Form\TypeType;

/**
 * Type controller.
 *
 */
class TypeController extends Controller
{
    /**
     * Lists all Type entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Type')->findAll();

        return $this->render('ProjetCoursBundle:Type:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Type entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Type')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Type entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Type:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Type entity.
     *
     */
    public function newAction()
    {
        $entity = new Type();
        $form   = $this->createForm(new TypeType(), $entity);

        return $this->render('ProjetCoursBundle:Type:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Type entity.
     *
     */
    public function createAction()
    {
        $entity  = new Type();
        $request = $this->getRequest();
        $form    = $this->createForm(new TypeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('type_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Type:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Type entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Type')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Type entity.');
        }

        $editForm = $this->createForm(new TypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Type:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Type entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Type')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Type entity.');
        }

        $editForm   = $this->createForm(new TypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('type_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Type:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Type entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Type')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Type entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('type'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
