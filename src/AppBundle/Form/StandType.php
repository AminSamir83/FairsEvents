<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StandType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numero',IntegerType::class)
            ->add('isReserved',  ChoiceType::class, array(
                'choices'  => array(
                     'null'=>null,
                    'No' => false,
                    'Yes' => true
                ),
            ))
            ->add('user',EntityType::class, array(
                'class'=>'AppBundle\Entity\User',
                'choice_label'=> "nom",
                'expanded'=>false,
                'multiple'=>false))
            ->add('foire', EntityType::class, array(
                'class'=>'AppBundle\Entity\Foire',
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false))
            -> add('Valider',SubmitType::class, array(
            'attr'=>array(
                'class'=>'btn btn-primary'
            )
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stand'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_stand';
    }


}
