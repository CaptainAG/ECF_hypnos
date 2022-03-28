<?php

namespace App\Form;

use App\Entity\Suite;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                'attr' => ['placeholder' => 'Nom'],
                'label'=> ''
            ])
            ->add('description',TextareaType::class,[
                'attr' => [
                    'placeholder' => 'Description',
                    'class'=> 'text_area_form'
            ],      
            ])
            ->add('price',NumberType::class,[
                'attr' => ['placeholder' => 'Prix'],
                'label'=> ''
            ])
            ->add('imageFile',VichImageType::class,[
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => true,
                'asset_helper' => true,
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suite::class,
        ]);
    }
}
