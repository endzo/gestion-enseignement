<?php

namespace Projet\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Departement;
use Projet\CoursBundle\Form\DepartementType;

/**
 * Departement controller.
 *
 */
class DepartementController extends Controller
{
    /**
     * Lists all Departement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Departement')->findAll();

        return $this->render('ProjetCoursBundle:Departement:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Departement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Departement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Departement entity.
     *
     */
    public function newAction()
    {
        $entity = new Departement();
        $form   = $this->createForm(new DepartementType(), $entity);

        return $this->render('ProjetCoursBundle:Departement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Departement entity.
     *
     */
    public function createAction()
    {
        $entity  = new Departement();
        $request = $this->getRequest();
        $form    = $this->createForm(new DepartementType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('departement_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Departement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Departement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
        }

        $editForm = $this->createForm(new DepartementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Departement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Departement entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Departement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Departement entity.');
        }

        $editForm   = $this->createForm(new DepartementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('departement_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Departement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Departement entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Departement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Departement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('departement'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
