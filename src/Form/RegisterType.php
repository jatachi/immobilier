<?php

namespace App\Form;

use App\Entity\Admins;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname',TextType::class,[
            'label' => 'Votre Nom',
            'constraints' => new Length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                'placeholder' => 'Saisissez votre nom svp'
            ]
        ])
        ->add('lastname',TextType::class,[
            'label' => 'Votre Prénom',
            'constraints' => new Length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                'placeholder' => 'Saisissez votre prénom svp'
            ]
        ])
        ->add('email',EmailType::class,[
            'label' => 'Votre Email',
            'constraints' => new Length([
                'min' => 2,
                'max' => 60
            ]),
            'attr' => [
                'placeholder' => 'Saisissez Votre email svp'
            ]
        ])
            ->add('password')
            ->add('submit',SubmitType::class,[
                'label' => "Créer"
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
