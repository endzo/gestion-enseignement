<?php

namespace Projet\CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Notification;
use Projet\CoursBundle\Form\NotificationType;

/**
 * Notification controller.
 *
 */
class NotificationController extends Controller
{
    /**
     * Lists all Notification entities.
     *
     */
    public function indexAction($id)
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	
    	
        $em = $this->getDoctrine()->getEntityManager();
        
        
        
        if($id != null && $id != 0 && $id != 'undefined')
        {

        	$entities = $em->getRepository('ProjetCoursBundle:Notification')->findEtudiantNotifications($id,$user->getId());
        	
        	return $this->render('ProjetCoursBundle:Notification:index.html.twig', array(
        	'news' => $entities,
            'idjs' => $id
        	));
        }

        $entities = $em->getRepository('ProjetCoursBundle:Notification')->findEtudiantFilActualite($user->getId());

        return $this->render('ProjetCoursBundle:Notification:index.html.twig', array(
            'news' => $entities,
            'idjs' => $id
        ));
    }

    /**
     * Finds and displays a Notification entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Notification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notification entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Notification:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Notification entity.
     *
     */
    public function newAction()
    {
        $entity = new Notification();
        $form   = $this->createForm(new NotificationType(), $entity);

        return $this->render('ProjetCoursBundle:Notification:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Notification entity.
     *
     */
    public function createAction()
    {
        $entity  = new Notification();
        $request = $this->getRequest();
        $form    = $this->createForm(new NotificationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notification_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Notification:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Notification entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Notification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notification entity.');
        }

        $editForm = $this->createForm(new NotificationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Notification:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Notification entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Notification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notification entity.');
        }

        $editForm   = $this->createForm(new NotificationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('notification_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Notification:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Notification entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Notification')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notification entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notification'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
