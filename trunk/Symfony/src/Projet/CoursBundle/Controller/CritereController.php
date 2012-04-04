<?php

namespace Projet\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Critere;
use Projet\CoursBundle\Form\CritereType;

/**
 * Critere controller.
 *
 */
class CritereController extends Controller
{
    /**
     * Lists all Critere entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Critere')->findAll();

        return $this->render('ProjetCoursBundle:Critere:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Critere entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Critere:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Critere entity.
     *
     */
    public function newAction()
    {
        $entity = new Critere();
        $form   = $this->createForm(new CritereType(), $entity);

        return $this->render('ProjetCoursBundle:Critere:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Critere entity.
     *
     */
    public function createAction()
    {
        $entity  = new Critere();
        $request = $this->getRequest();
        $form    = $this->createForm(new CritereType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('critere_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Critere:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Critere entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $editForm = $this->createForm(new CritereType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Critere:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Critere entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $editForm   = $this->createForm(new CritereType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('critere_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Critere:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Critere entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Critere')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Critere entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('critere'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
