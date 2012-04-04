<?php

namespace Projet\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            //->add('chemin')
            //->add('created_at')
            ->add('attachement', 'file')
        ;
    }

    public function getName()
    {
        return 'projet_coursbundle_documenttype';
    }
}
