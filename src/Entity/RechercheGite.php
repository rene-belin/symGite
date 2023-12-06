<?php

namespace App\Entity;

use App\Repository\RechercheGiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheGiteRepository::class)]
class RechercheGite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?bool $equipementInterieur = null;

    #[ORM\Column]
    private ?bool $equipementExterieur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function isEquipementInterieur(): ?bool
    {
        return $this->equipementInterieur;
    }

    public function setEquipementInterieur(bool $equipementInterieur): static
    {
        $this->equipementInterieur = $equipementInterieur;

        return $this;
    }

    public function isEquipementExterieur(): ?bool
    {
        return $this->equipementExterieur;
    }

    public function setEquipementExterieur(bool $equipementExterieur): static
    {
        $this->equipementExterieur = $equipementExterieur;

        return $this;
    }
}
