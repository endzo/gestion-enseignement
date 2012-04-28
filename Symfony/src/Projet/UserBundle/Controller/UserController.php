<?php

namespace Projet\UserBundle\Controller;

use Projet\UserBundle\Form\UserTypePseudo;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Projet\UserBundle\Entity\User;
use Projet\UserBundle\Form\UserType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
	
	public function usernamesAction($tag)
	{
		$em = $this->getDoctrine()->getEntityManager();
	
		$entities = $em->getRepository('ProjetUserBundle:Message')->findUsers($tag);
	
		return $this->render('ProjetUserBundle:User:founded.html.twig', array(
	'entities' => $entities
	));
	}
	
	
	
	
	
	
	public function loginAction()
    {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session */

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        return $this->container->get('templating')->renderResponse('ProjetUserBundle:User:login.html.'.$this->container->getParameter('fos_user.template.engine'), array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
	
	
	
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ProjetUserBundle:User')->findAll();

        return $this->render('ProjetUserBundle:User:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Cet utilisateur est introuvable');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }
    
    /**
     * Finds and displays a User entity by the pseudo.
     *
     */
    public function pseudoShowAction($pseudo)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$entity = array();
    	$users = $em->getRepository('ProjetUserBundle:Etudiant')->findAll();
    	foreach ($users as $user) {
    		if ($user->getPseudo() == $pseudo)
    		{
    			$entity[] = $user;
    		}	
    	}
    	
    
    	return $this->render('ProjetUserBundle:User:founded.html.twig', array(
    				'entities'      => $entity
	    ));
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
    	// On teste que l'utilisateur dispose bien du rôle ROLE_AUTEUR
    	if( ! $this->get('security.context')->isGranted('ROLE_ADMIN') )
    	{
    		// Sinon on déclenche une exception "Accès Interdit"
    		throw new AccessDeniedHttpException('Accès limité aux administrateur');
    	}
    	
    	
    	
        $entity = new User();
        $form   = $this->createForm(new UserType(), $entity);

        return $this->render('ProjetUserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction()
    {
        $entity  = new User();
        $request = $this->getRequest();
        $form    = $this->createForm(new UserType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ProjetUserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
    	
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	if ($user->getId() != $id ) {
    		throw $this->createNotFoundException('Vous n\'êtes pas autorisé à effectuer cette action.');
    	}
    	
    	
    	
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(new UserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjetUserBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    
    
    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function pseudoAction($id)
    {
    	
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	if ($user->getId() != $id ) {
    		throw $this->createNotFoundException('Vous n\'êtes pas autorisé à effectuer cette action.');
    	}
    	
    	
    	$em = $this->getDoctrine()->getEntityManager();
    
    	$entity = $em->getRepository('ProjetUserBundle:User')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find User entity.');
    	}
    
    	$editForm = $this->createForm(new UserTypePseudo(), $entity);
    	$deleteForm = $this->createDeleteForm($id);
    
    	return $this->render('ProjetUserBundle:User:editPseudo.html.twig', array(
		    'entity'      => $entity,
		    'edit_form'   => $editForm->createView(),
		    'delete_form' => $deleteForm->createView(),
	    ));
    }
    
    
    

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ProjetUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm   = $this->createForm(new UserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $id)));
        }

        return $this->render('ProjetUserBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    
    /**
     * Edits an existing User entity.
     *
     */
    public function updatePseudoAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    
    	$entity = $em->getRepository('ProjetUserBundle:User')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find User entity.');
    	}
    
    	$editForm   = $this->createForm(new UserTypePseudo(), $entity);
    	$deleteForm = $this->createDeleteForm($id);
    
    	$request = $this->getRequest();
    
    	$editForm->bindRequest($request);
    
    	if ($editForm->isValid()) {
    		$em->persist($entity);
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('user_show', array('id' => $id)));
    	}
    
    	return $this->render('ProjetUserBundle:User:edit.html.twig', array(
    'entity'      => $entity,
    'edit_form'   => $editForm->createView(),
    'delete_form' => $deleteForm->createView(),
    ));
    }
    
    
    
    

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ProjetUserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
