<?php

namespace Projet\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EvaluationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('note')
            ->add('remarque')
            //->add('created_at')
            //->add('etudiant')
            //->add('enseignement')
        ;
    }

    public function getName()
    {
        return 'projet_coursbundle_evaluationtype';
    }
}
