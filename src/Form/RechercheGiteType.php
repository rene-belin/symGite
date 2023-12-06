<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Region;
use App\Entity\Service;
use App\Entity\Departement;
use App\Entity\EquipementInterieur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RechercheGiteType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('region', EntityType::class, [
                "class" => Region::class,
                "choice_label" => "nom",
                "label" => "Région",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('departement', EntityType::class, [
                "class" => Departement::class,
                "choice_label" => "nom",
                "label" => "Département",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('ville', EntityType::class, [
                "class" => Ville::class,
                "choice_label" => "nom",
                "label" => "Ville",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('Equipement interieur', EntityType::class, [
                "class" => EquipementInterieur::class,
                "choice_label" => "Equipement interieur",
                "label" => "Equipement interieur",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('Equipement exterieur', EntityType::class, [
                "class" => EquipementInterieur::class,
                "choice_label" => "Equipement exterieur",
                "label" => "Equipement exterieur",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('Service', EntityType::class, [
                "class" => Service::class,
                "choice_label" => "Servicer",
                "label" => "Service",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ])
            ->add('submit', SubmitType::class, [
                "label" => "Trouver mon gite",
                "attr" => ["class" => "btn btn-outline-info"]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => GiteSearch::class,
        ]);
    }
}
