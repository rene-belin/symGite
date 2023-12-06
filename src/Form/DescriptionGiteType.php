<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Proprietaire;
use App\Entity\EquipementExterieur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\EquipementInterieur; // Assurez-vous d'importer la classe EquipementInterieur

class DescriptionGiteType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('proprietaire', EntityType::class, [
                "class" => Proprietaire::class,
                "choice_label" => "nom",
                "label" => "Propriétaire",
                "disabled" => true
            ])
            ->add('surface_habitable')
            ->add('nombre_chambres')
            ->add('nombre_couchages')
            ->add('equipement_interieur', EntityType::class, [
                "class" => EquipementInterieur::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true,
            ])
            ->add('equipement_exterieur', EntityType::class, [
                "class" => EquipementExterieur::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true,
            ])
            ->add('accueil_animaux', EntityType::class, [
                "class" => Gite::class,
                "choice_label" => "accueil_animaux",
                "multiple" => true,
                "expanded" => true,
            ])
            ->add('tarif_animaux', EntityType::class, [
                "class" => Gite::class,
                "choice_label" => "tarif_animaux",
                "multiple" => true,
                "expanded" => true,
            ])
            ->add('tarif_location', EntityType::class, [
                "class" => Gite::class,
                "choice_label" => "tarif_location",
                "multiple" => true,
                "expanded" => true,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
