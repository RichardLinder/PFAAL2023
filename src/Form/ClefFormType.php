<?php

namespace App\Form;

use App\Entity\Clef;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClefFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroDeSerie')
            ->add('metal')
            ->add('forme')
            ->add('bois')
            ->add('esProduit')
            ->add('esLivre')
            ->add('devis')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clef::class,
        ]);
    }
}
