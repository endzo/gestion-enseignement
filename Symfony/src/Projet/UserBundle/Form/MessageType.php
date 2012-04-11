<?php

namespace Projet\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('sujet')
            ->add('message')
            ->add('destinataire')
            //->add('created_at')
            ->add('user')
        ;
    }

    public function getName()
    {
        return 'projet_userbundle_messagetype';
    }
}
