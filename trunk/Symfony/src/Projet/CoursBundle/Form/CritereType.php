<?php

namespace Projet\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CritereType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('note')
            ->add('created_at')
            ->add('enseignement')
        ;
    }

    public function getName()
    {
        return 'projet_coursbundle_criteretype';
    }
}
