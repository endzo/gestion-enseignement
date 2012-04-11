<?php

namespace Projet\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('created_at')
            ->add('departement')
        ;
    }

    public function getName()
    {
        return 'projet_coursbundle_formationtype';
    }
}
