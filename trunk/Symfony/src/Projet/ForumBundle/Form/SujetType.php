<?php

namespace Projet\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SujetType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            //->add('created_at')
            ->add('visibilite')
            //->add('enseignement')
        ;
    }

    public function getName()
    {
        return 'projet_forumbundle_sujettype';
    }
}
