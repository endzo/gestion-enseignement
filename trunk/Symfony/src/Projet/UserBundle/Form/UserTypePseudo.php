<?php

namespace Projet\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserTypePseudo extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('pseudo')
        ;
    }

    public function getName()
    {
        return 'projet_userbundle_usertype';
    }
}
