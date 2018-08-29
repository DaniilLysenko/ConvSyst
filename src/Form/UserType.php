<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('email', EmailType::class, [
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('sex', ChoiceType::class, [
                'choices' => [
                    'Man' => 'man',
                    'Woman' => 'woman'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn-success']
            ]);
    }
}