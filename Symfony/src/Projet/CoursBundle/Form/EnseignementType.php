<?php

namespace Projet\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EnseignementType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('visibilite')
            ->add('actif')
            ->add('promotion')
            //->add('created_at')
        ;
    }

    public function getName()
    {
        return 'projet_coursbundle_enseignementtype';
    }
}
