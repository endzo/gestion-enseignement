<?php

namespace Amine\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('created_at')
            ->add('visibility')
            ->add('user')
        ;
    }

    public function getName()
    {
        return 'amine_forumbundle_subjecttype';
    }
}
