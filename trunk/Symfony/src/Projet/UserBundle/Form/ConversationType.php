<?php

namespace Projet\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ConversationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('msg')
            //->add('created_at')
            //->add('user')
            //->add('message')
        ;
    }

    public function getName()
    {
        return 'projet_userbundle_conversationtype';
    }
}
