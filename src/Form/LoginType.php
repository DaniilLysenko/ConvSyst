<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'required' => false,
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('login', SubmitType::class, [
                'attr' => ['class' => 'btn-success']
            ]);
    }
}