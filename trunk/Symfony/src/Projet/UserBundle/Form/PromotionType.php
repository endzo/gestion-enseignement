<?php

namespace Projet\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('created_at')
            ->add('annee')
            ->add('formation')
        ;
    }

    public function getName()
    {
        return 'projet_userbundle_promotiontype';
    }
}
