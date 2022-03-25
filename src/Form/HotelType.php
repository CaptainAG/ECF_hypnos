<?php

namespace App\Form;

use App\Entity\Hotel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => ['placeholder' => 'Nom'],
                'label'=> ''
            ])
            ->add('city',TextType::class,[
                'attr' => ['placeholder' => 'Ville'],
                'label'=> ''
            ])
            ->add('adress',TextType::class,[
                'attr' => ['placeholder' => 'Adresse'],
                'label'=> ''
            ])
            ->add('description',TextareaType::class,[
                'attr' => [
                    'placeholder' => 'Description',
                    'class'=> 'text_area_hotel'
            ],      
                'label'=> ''
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }
}
