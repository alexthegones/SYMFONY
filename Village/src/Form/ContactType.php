<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => "Saisir un nom",
                    'style' => 'width: 250px'
                ]
            ])
            ->add('email', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => "Saisir un email",
                    'style' => 'width: 250px'
                ]
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => "Saisir un message",
                    'style' => 'width: 250px'
                ]
            ])
            
            
            ;
           
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'method' => 'post'
        ]);
    }


}