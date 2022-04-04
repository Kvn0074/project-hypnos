<?php

namespace App\Form;

use App\Entity\Compte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'prenom',
                'constraints'=> new Length(null, 2, 50),
                'attr' => [
                    'placeholder' => "votre prenom",
                    'class' => "form-items"
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'nom',
                'constraints'=> new Length(null, 2, 50),
                'attr' => [
                    'placeholder' => "votre nom",
                    'class' => "form-items"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'mail',
                'constraints'=> new Length(null, 2, 180),
                'attr' => [
                    'placeholder' => "votre mail",
                    'class' => "form-items"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'les mots de passes doivent être identique' ,
                'label' => 'votre mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'mot de passe',
                        'class' => "form-items"
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmation Mot de passe',
                    'attr' => [
                        'placeholder' => 'confirmation mot de passe',
                        'class' => "form-items"
                    ]
                ],

            ])


            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' => "form-button"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
