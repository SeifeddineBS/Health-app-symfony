<?php

namespace App\Form;

use App\Entity\Objectif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('reponse', ChoiceType::class, [
                'choices' => [
                    '1'=> 1,
                    '2'=> 2,
                    '3'=> 3,
                    '4'=> 4,
                    '5'=> 5,
                    '6'=> 6,
                    '7'=> 7,
                    '8'=> 8,
                    '9'=> 9,
                    '10'=> 10,
                    '11'=> 11,
                    '12'=> 12,
                    '13'=> 13,
                    '14'=> 14,
                    '15'=> 15,
                    '16'=> 16,
                    '17'=> 17,
                    '18'=> 18,
                    '19'=> 19,
                    '20'=> 20,
                    '21'=> 21,
                    '22'=> 22,
                    '23'=> 23,
                    '24'=> 24,
                    '25'=> 25,
                    '26'=> 26,
                    '27'=> 27,
                    '28'=> 28,
                    '29'=> 29,
                    '30'=> 30,
                ]
            ])
            ->add('datedebut', null, [
                'label' => 'Date de début'
            ])
            ->add('duree', null, [
        'label' => 'Durée'
    ])
            ->add('mailchecked')
            //->add('icone')
            ->add('idclient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Objectif::class,
        ]);
    }
}
