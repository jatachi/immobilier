<?php

namespace App\Form;

use App\Entity\Admins;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class, [
            'disabled' => true,
            'label' => 'Votre email'
        ])
        ->add('firstname', TextType::class, [
            'disabled' => true,
            'label' => 'Votre nom'
        ])
        ->add('lastname', TextType::class, [
            'disabled' => true,
            'label' => 'Votre prénom'
        ])
        ->add('old_password', PasswordType::class,[
            'label' => 'Mon mot de passe actuel',
            'mapped' => false,
            'attr' => [
                'placeholder' => 'Veuillez saissir votre mot de passe actuel'
            ]
        ])
        ->add('new_password',RepeatedType::class,[
            'label' => 'Votre nouveau mot de passe',
            'type' => PasswordType::class,
            'mapped' => false,
            'invalid_message' => 'Le mot de pase et la confirmation doivente
            etre identique',
            'required' => true,
            'first_options' => [
                'label' => 'Mon nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'merci de saissir votre nouveau mot de passe'
                ]
            ],
            'second_options' => [
                'label' => 'Confirmez votre nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de confirmer votre nouveau mot de passe'
                ]
            ]
        ])
        ->add('submit',SubmitType::class,[
            'label' => 'Mettre à jour'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admins::class,
        ]);
    }
}
