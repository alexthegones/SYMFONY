<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EventSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => "Saisir un nom",
                    'style' => 'width: 250px'
                ]
            ])
            ->add('lieu', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => "Saisir un lieu",
                    'style' => 'width: 250px'
                ]
            ]);
           
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EventSearch::class,
            'method' => 'get',
            'csrf_protection' => false //protection par token desactivée
        ]);
    }


}
