<?php

namespace Projet\EnseignementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ProjetEnseignementBundle:Default:index.html.twig', array('name' => $name));
    }
}
