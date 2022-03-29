<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Sujet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => ['placeholder' => 'Nom'],
                'label'=> ''
            ])
            ->add('firstname',TextType::class,[
                'attr' => ['placeholder' => 'Prénom'],
                'label'=> ''
            ])
            ->add('email',EmailType::class,[
                'attr' => ['placeholder' => 'Email'],
                'label'=> ''
            ])
            ->add('message',TextareaType::class,[
                'attr' => [
                    'placeholder' => 'Écrivez votre message',
                    'class'=> 'text_area_form'
            ],      
                'label'=> ''
            ])
            ->add('sujet',EntityType::class,[
                'class' => Sujet::class,
                'choice_label' => function($sujet){
                    return $sujet->getDescription();
                   },
                'label' => '  ',
                'placeholder' => '- Choisir un sujet -',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
