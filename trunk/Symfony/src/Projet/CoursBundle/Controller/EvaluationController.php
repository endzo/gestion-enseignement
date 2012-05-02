<?php

namespace Projet\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Evaluation;
use Projet\CoursBundle\Form\EvaluationType;

/**
 * Evaluation controller.
 *
 */
class EvaluationController extends Controller
{
    /**
     * Lists all Evaluation entities.
     *
     */
    public function indexAction($id_cours)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Evaluation')->findAllForEnseignement($id_cours);
        $cours = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id_cours);

        return $this->render('ProjetCoursBundle:Evaluation:index.html.twig', array(
            'entities' => $entities,
            'cours'    => $cours
        ));
    }

    /**
     * Finds and displays a Evaluation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Evaluation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Evaluation entity.
     *
     */
    public function newAction($id_cours)
    {
        $entity = new Evaluation();
        $form   = $this->createForm(new EvaluationType(), $entity);

        return $this->render('ProjetCoursBundle:Evaluation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id_cours' => $id_cours
        ));
    }

    /**
     * Creates a new Evaluation entity.
     *
     */
    public function createAction($id_cours)
    {
        $entity  = new Evaluation();
        $request = $this->getRequest();
        $form    = $this->createForm(new EvaluationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$cours = $em->getRepository('ProjetCoursBundle:enseignement')->find($id_cours);
        	
        	if (!$cours) {
        		throw $this->createNotFoundException('Cours introuvable !!.');
        	}
        	
        	$cours->addEvaluation($entity);
        	
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$entity->setEtudiant($user);
        	
        	
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();
            
            $em->getRepository('ProjetCoursBundle:enseignement')->setAverageNote($id_cours);
            $em->flush();
            
            return $this->redirect($this->generateUrl('enseignement_show', array('id' => $cours->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Evaluation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id_cours' => $id_cours
        ));
    }

    /**
     * Displays a form to edit an existing Evaluation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $editForm = $this->createForm(new EvaluationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Evaluation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Evaluation entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $editForm   = $this->createForm(new EvaluationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('evaluation_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Evaluation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Evaluation entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Evaluation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Evaluation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('evaluation'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
