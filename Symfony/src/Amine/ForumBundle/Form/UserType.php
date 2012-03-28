<?php

namespace Amine\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('login')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('created_at')
        ;
    }

    public function getName()
    {
        return 'amine_forumbundle_usertype';
    }
}
