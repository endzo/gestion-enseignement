<?php

namespace Projet\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            //->add('usernameCanonical')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            //->add('emailCanonical')
            //->add('enabled')
            //->add('salt')
            //->add('lastLogin')
            //->add('locked')
            //->add('expired')
            //->add('expiresAt')
            //->add('confirmationToken')
            //->add('passwordRequestedAt')
            //->add('roles')
            //->add('credentialsExpired')
            //->add('credentialsExpireAt')
        ;
    }

    public function getName()
    {
        return 'projet_userbundle_usertype';
    }
}
