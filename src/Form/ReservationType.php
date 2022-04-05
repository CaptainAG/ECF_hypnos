<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\Reservation;
use App\Entity\Suite;
use App\Repository\SuiteRepository;
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
use Symfony\Component\Validator\Constraints\NotBlank;

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
                'choice_label' => 'name',
                'label' => '  ',
                'placeholder' => '- Choisir un hotel -',
                
                
            ]);
        
            
             $formModifier = function (FormInterface $form, Hotel $hotel = null) {
                $suite = null === $hotel ? [] : $hotel->getSuite();
        
                $form->add('suite',EntityType::class,[
                    'class' => Suite::class,
                    'choices' => $suite,
                    'placeholder' => '- Choisir une suite -',
                    'disabled' => $hotel === null
                ]); 
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getHotel());
            }
        );

        $builder->get('hotel')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $hotel = $event->getForm()->getData();
                

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $hotel);
            }
        );
        
    } 
    
    
       
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
