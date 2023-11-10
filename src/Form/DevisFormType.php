<?php

namespace App\Form;

use App\Entity\Bois;
use App\Entity\Devis;
use App\Entity\Forme;
use App\Entity\Metal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DevisFormType extends AbstractType
{

    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        // ici on on a le formulaire avec les type 

        // nom a le type textType qui permet de crée un petit text 
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('typeSerrure', TextType::class)
            // le type ici permet de crée une entré pour un text long
            ->add('descriptionSerrure', TextareaType::class)
            ->add('NumerosDeSerieSerrure', TextType::class)
            ->add('detaillSuplementaire', TextareaType::class)

            // ici c'est un attribut de type entitytype qui permet d'importé une classe
            ->add('bois',EntityType::class, [
                // Ajout du choix du bois
                'class' => Bois::class, 'choice_label' => 'titre_bois'])
            ->add('metal',EntityType::class, [
                // Ajout du choix du metal
                'class' => Metal::class,'choice_label' => 'titre_metal'])
            ->add('forme',EntityType::class, [
                // Ajout du choix du Form
                'class' => Forme::class,'choice_label' => 'titre_forme'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
