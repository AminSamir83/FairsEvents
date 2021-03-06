<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\StringType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HotelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class)
            ->add('ville',EntityType::class, array(
                'class'=>'AppBundle\Entity\Ville',
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false))
            ->add('Valider',SubmitType::class, array(
                'attr'=>array(
                    'class'=>'btn btn-primary'
                )
            ))
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hotel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_hotel';
    }


}
