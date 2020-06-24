<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', null, [
                'attr' => [
                    'placeholder' => "Nom de l'événement",
                    'style' => 'width: 300px'
                ]
            ])
            ->add('Lieu', null, [
                'attr' => [
                    'placeholder' => "Lieu de l'événement",
                    'style' => 'width: 300px'
                ]
            ])
            ->add('Date', BirthdayType::class,[
                
            ])
            ->add('Description', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Description de l'événement",
                    'style' => 'width: 500px'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
