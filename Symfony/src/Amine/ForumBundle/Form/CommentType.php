<?php

namespace Amine\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('comm')
            ->add('created_at')
            ->add('user')
        ;
    }

    public function getName()
    {
        return 'amine_forumbundle_commenttype';
    }
}
