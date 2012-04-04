<?php

namespace Projet\CoursBundle\Controller;

use Projet\CoursBundle\Entity\Devoir;

use Projet\CoursBundle\Entity\Document;
use Projet\CoursBundle\Form\DocumentType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\CoursBundle\Entity\Enseignement;
use Projet\CoursBundle\Form\EnseignementType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Enseignement controller.
 *
 */
class EnseignementController extends Controller
{
    /**
     * Lists all Enseignement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetCoursBundle:Enseignement')->findAll();

        return $this->render('ProjetCoursBundle:Enseignement:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Enseignement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }
        $devoirs   = $entity->getDevoirs();
        $tps       = Devoir::getTps($devoirs);
        $tds       = Devoir::getTds($devoirs);
        $exercices = Devoir::getExercices($devoirs);
        $projets   = Devoir::getProjets($devoirs);
        $autres    = Devoir::getAutres($devoirs);
        $documents  = $entity->getDocuments(); 

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Enseignement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'devoirs'	  => $devoirs,
            'tps'	      => $tps,
            'tds'	      => $tds,
            'exercices'	  => $exercices,
            'projets'	  => $projets,
            'autres'	  => $autres,
            'documents'	  => $documents,

        ));
    }

    /**
     * Displays a form to create a new Enseignement entity.
     *
     */
    public function newAction()
    {
        $entity = new Enseignement();
        $form   = $this->createForm(new EnseignementType(), $entity);

        return $this->render('ProjetCoursBundle:Enseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Enseignement entity.
     *
     */
    public function createAction()
    {
        $entity  = new Enseignement();
        $request = $this->getRequest();
        $form    = $this->createForm(new EnseignementType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enseignement_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetCoursBundle:Enseignement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Enseignement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }

        $editForm = $this->createForm(new EnseignementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetCoursBundle:Enseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Enseignement entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }

        $editForm   = $this->createForm(new EnseignementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enseignement_edit', array('id' => $id)));
        }

        return $this->render('ProjetCoursBundle:Enseignement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Enseignement entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enseignement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enseignement'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    
    
	/**
     * Displays a form to create a new Document entity.
     *
     */
    public function addDocumentAction($id)
    {
        $entity = new Document();
        $form   = $this->createForm(new DocumentType(), $entity);

        return $this->render('ProjetCoursBundle:Enseignement:create_document.html.twig', array(
            'entity' => $entity,
            '$id'    => $id, 
            'form'   => $form->createView()
        ));
    }
    
    
    
    /**
     * Creates a new Document entity.
     *
     */
    public function create_documentAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();

        $cours = $em->getRepository('ProjetCoursBundle:Enseignement')->find($id);

        if (!$cours) {
            throw $this->createNotFoundException('Unable to find Enseignement entity.');
        }
        
    	$entity  = new Document();
    	$request = $this->getRequest();
    	$form    = $this->createForm(new DocumentType(), $entity);
    	$form->bindRequest($request);
    	if ($form->isValid()) {
    		
    		
    		$cours->addDocument($entity);
    		$entity->setChemin($entity->getNom().$entity->getCreatedAt()->format('Y_m_d_H_i_s'));
    		
    		$em = $this->getDoctrine()->getEntityManager();
    		
    		$em->persist($entity);
    		
    		$em->flush();
    		
    		$form['attachement']->getData()->move($entity->getAbsolutePath(), $entity->getNom());
    
    		return $this->redirect($this->generateUrl('document_show', array('id' => $entity->getId())));
    
    	}
    
    	return $this->render('ProjetCoursBundle:Enseignement:create_document.html.twig', array(
			    'entity' => $entity,
			    'id'     => $id,
			    'form'   => $form->createView()
			    ));
    }
}
