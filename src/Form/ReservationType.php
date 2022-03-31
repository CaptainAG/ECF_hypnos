<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\Reservation;
use App\Entity\Suite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDate', DateType::class, [
                'label' => 'Arrivé le :',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                
                
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Départ le :',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                
            ])
            ->add('hotel',EntityType::class,[
                'class' => Hotel::class,
                'mapped' => false,
                'choice_label' => 'name',
                'label' => '  ',
                'placeholder' => '- Choisir un hotel -',
                
            ])

            
           
            ->add('suite',EntityType::class,[
                'class' => Suite::class,
                'choice_label' => function ($suite) {
                    return $suite->getTitle() . " (" . $suite->getHotel() .")";
                },
                'label' => '  ',
                'placeholder' => '- Choisir une suite -',
                
            ])
              
            
               
           /*
            ->add('suite', ChoiceType::class,[
                'placeholder' => '- Choisir une suite -',
            ]) */

               
        ;
        
        /*
        $formModifier = function (FormInterface $form, Hotel $hotel = null) {
            $suite = null === $hotel ? [] : $hotel->getSuite();

           
            $form->add('Suite', EntityType::class, [
                'class' => Suite::class,
                'mapped' => false,
                'choices' => $suite,
                'required' => false,
                'choice_label' => 'title',
                'placeholder' => 'Suite',
                'attr' => ['class' => 'custom-select'],
                'label' => 'Suite '
            ]);
        };
        

        $builder->get('hotel')->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event) use ($formModifier){
               $hotel= $event->getForm()->getData();
               $formModifier($event->getForm()->getParent(), $hotel);
            }
        );

        */
         
    } 

       
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
