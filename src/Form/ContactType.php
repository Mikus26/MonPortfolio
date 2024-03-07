<?php

namespace App\Form;


use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'Nom',
                TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => [
                        'placeholder' => 'Entrez votre nom'
                    ],
                    'required' => true,
                    'constraints' => [
                        new NotBlank(),
                        new Length(['max' => 255]),

                    ],
                ]
            )
            ->add('Prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(), // Assure que le prénom n'est pas vide
                    new Length([
                        'max' => 255, // Limite la longueur maximale du prénom
                        'maxMessage' => 'Le prénom ne doit pas dépasser {{ limit }} caractères.'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\-\'\s]+$/u', // Permet seulement les lettres, espaces, tirets et apostrophes
                        'message' => 'Le prénom ne doit contenir que des lettres, espaces, tirets et apostrophes.'
                    ]),
                ],
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Laissez votre adresse mail pour contact'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Email(),

                ]
            ])

            ->add('NumeroTel', TextType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^\+?[0-9]{8,15}$/',
                        'message' => 'Veuillez entrer un numéro de téléphone valide.'
                    ]),
                ],
            ])
            ->add('Message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'placeholder' => 'Entrez votre message',
                    'maxlength' => 400 // Ajout d'un attribut HTML5 pour limiter la longueur
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'max' => 400,
                        'maxMessage' => 'Le message ne doit pas dépasser {{ limit }} caractères.'
                    ]),
                ],
            ])
            ->add('Entreprise', TextType::class, [
                'label' => 'Entreprise',
                'attr' => [
                    'placeholder' => 'Entrez le nom de votre entreprise'
                ],
                'required' => false, // Rend le champ facultatif
                'constraints' => [
                    new Length([
                        'max' => 255, // Limite la longueur maximale du nom de l'entreprise
                        'maxMessage' => 'Le nom de l\'entreprise ne doit pas dépasser {{ limit }} caractères.'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s\-\'\.\,]+$/u', // Permet seulement les lettres, les chiffres, les espaces, les tirets, les apostrophes, les points et les virgules
                        'message' => 'Le nom de l\'entreprise ne doit contenir que des lettres, des chiffres, des espaces, des tirets, des apostrophes, des points et des virgules.'
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
