<?php

namespace App\Client\Form;

use App\Client\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du client',
                'attr' => [
                    'placeholder' => 'Doe'
                ]
            ])
            ->add('prenom', null, [
                'attr' => [
                    'placeholder' => 'John'
                ]
            ])
            ->add('telephone', TelType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => '(00221) 77 XXX XX XX'
                ],
                'label' => 'Téléphone',
                'label_attr' => ['class' => 'text-gray-900'],

            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'johndoe@example.com'
                ],
                'label' => 'Adresse email',
                'label_attr' => ['class' => 'text-gray-900'],

            ])
            ->add('dateNaissance', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance',
                'attr' => [
                    'class' => 'text-center text-dark',
                ]
            ])
            ->add('photoProfile', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Sélectionner une photo',
                    'onchange' => 'showPreview(event)',
                    'value' => 'photo profile'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
