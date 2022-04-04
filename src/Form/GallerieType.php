<?php

namespace App\Form;

use App\Entity\Gallerie;
use App\Entity\Suite;
use App\Repository\SuiteRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class GallerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $hotel= $options['hotel'];
        $builder
            ->add('imageFile',VichImageType::class,[
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => true,
                'asset_helper' => true,
            ])
            ->add('Suite',EntityType::class,[
                'class' => Suite::class,
                'query_builder' =>function (SuiteRepository $suite) use ($hotel){
                    return $suite->createQueryBuilder('s')
                    ->where('s.hotel = :hotel')
                    ->setParameter('hotel', $hotel )
                    ->orderBy('s.title');
                 },
                'choice_label' => 'title',
                'label' => '  ',
                'placeholder' => '- Choisir une suite -',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gallerie::class,
            'hotel' => null
        ]);
    }
}

