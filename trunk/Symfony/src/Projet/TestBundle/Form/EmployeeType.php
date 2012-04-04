<?php

namespace Projet\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('salaire')
        ;
    }

    public function getName()
    {
        return 'projet_testbundle_employeetype';
    }
}
