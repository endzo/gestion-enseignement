<?php

namespace Projet\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('commentaire')
            //->add('created_at')
            //->add('sujet')
        ;
    }

    public function getName()
    {
        return 'projet_forumbundle_commenttype';
    }
}
