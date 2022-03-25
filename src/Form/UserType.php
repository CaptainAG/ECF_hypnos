<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\User;
use App\Repository\HotelRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
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
            ->add('password',PasswordType::class,[
                'attr' => ['placeholder' => 'Mot de passe'],
                'label'=> '',
                'required' => false,
            ])
           
            ->add('hotel',EntityType::class,[
                'class' => Hotel::class,
                'choice_label' => function($hotel){
                    return $hotel->getName();
                   },
                'label' => '  ',
                'placeholder' => '- Choisir un hotel -',
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
