<?php

namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => ['class' => 'form-control mb-3', 'id'=>'demo', 'placeholder'=>'Please type event name'],
            ])
            ->add('date', null, [ 'label' => 'Date and start time',
                'attr' => ['class' => 'form-control mb-3'],
                'widget'=>'single_text'
            ])
            ->add('description', null, [
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type event description'],
            ])
            ->add('image', null, [
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please paste a link of event picture'],
            ])
            ->add('capacity', IntegerType::class, [
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type capacity of event'],
                ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail Address',
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type e-mail of event'],
            ])
            ->add('phonenumber', TelType::class, [
            'label' => 'Phone Number',
                    'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type event phone number'],
            ])
            ->add('address', TextareaType::class, [
                'label' => 'Address',
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type full address of event'],
            ])
            ->add('URL', UrlType::class, [
                'label' => 'Website URL',
                'attr' => ['class' => 'form-control mb-3', 'placeholder'=>'Please type URL of event'],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Music' => 'Music',
                    'Sport' => 'Sport',
                    'Theater' => 'Theater',
                    'Festival' => 'Festival',
                    'Ball' => 'Ball'
                ],'attr' => ['class' => 'form-control mb-3']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}
