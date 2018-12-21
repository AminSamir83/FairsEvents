<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\ChoiceTypeExtension;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FoireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class)
            ->add('dateDebut', DateTimeType::class)
            ->add('dateFin', DateTimeType::class)
            ->add('categorie', TextType::class)
            ->add('nbreStandsTotal', IntegerType::class)
            ->add('nbreStandsRest',IntegerType::class)
            ->add('image', FileType::class,array(
                'label'=>'Veuillez ajouter une image',
                  'data_class'=>null))
            ->add('ville', EntityType::class, array(
                'class'=>'AppBundle\Entity\Ville',
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false))
            ->add('Valider', SubmitType::class,array(
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
            'data_class' => 'AppBundle\Entity\Foire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_foire';
    }


}
