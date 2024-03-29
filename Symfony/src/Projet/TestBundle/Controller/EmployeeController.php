<?php

namespace Projet\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Projet\TestBundle\Entity\Employee;
use Projet\TestBundle\Form\EmployeeType;

/**
 * Employee controller.
 *
 */
class EmployeeController extends Controller
{
	public function greetingAction(){
		
		$name ="pas de resultat";
		$request = $this->get('request');
		$name=$request->request->get('name');
		
		
		$em = $this->getDoctrine()->getEntityManager();
		$entities = $em->getRepository('ProjetTestBundle:Employee')->findAll();
	

		return $this->render('ProjetTestBundle:Employee:index.html.twig', array(
            'entities' => $entities,
            'name'     => $name
        ));
	}
	
	
	
	
    /**
     * Lists all Employee entities.
     *
     */
    public function indexAction()
    {
    	$name ="pas de resultat";
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetTestBundle:Employee')->findAll();

        return $this->render('ProjetTestBundle:Employee:index.html.twig', array(
            'entities' => $entities,
            'name'     => $name
        ));
    }

    /**
     * Finds and displays a Employee entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetTestBundle:Employee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employee entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetTestBundle:Employee:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Employee entity.
     *
     */
    public function newAction()
    {
        $entity = new Employee();
        $form   = $this->createForm(new EmployeeType(), $entity);

        return $this->render('ProjetTestBundle:Employee:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Employee entity.
     *
     */
    public function createAction()
    {
        $entity  = new Employee();
        $request = $this->getRequest();
        $form    = $this->createForm(new EmployeeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('employee_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetTestBundle:Employee:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Employee entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetTestBundle:Employee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employee entity.');
        }

        $editForm = $this->createForm(new EmployeeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetTestBundle:Employee:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Employee entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetTestBundle:Employee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employee entity.');
        }

        $editForm   = $this->createForm(new EmployeeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('employee_edit', array('id' => $id)));
        }

        return $this->render('ProjetTestBundle:Employee:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Employee entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetTestBundle:Employee')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Employee entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('employee'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
