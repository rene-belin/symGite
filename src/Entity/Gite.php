<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $surfaceHabitable = null;

    #[ORM\Column]
    private ?int $nombreChambres = null;

    #[ORM\Column]
    private ?int $nombreCouchages = null;

    #[ORM\Column]
    private ?bool $accueilAnimaux = null;

    #[ORM\Column(length: 100)]
    private ?string $tarifAnimaux = null;

    #[ORM\Column(length: 100)]
    private ?string $tarifLocation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurfaceHabitable(): ?string
    {
        return $this->surfaceHabitable;
    }

    public function setSurfaceHabitable(string $surfaceHabitable): static
    {
        $this->surfaceHabitable = $surfaceHabitable;

        return $this;
    }

    public function getNombreChambres(): ?int
    {
        return $this->nombreChambres;
    }

    public function setNombreChambres(int $nombreChambres): static
    {
        $this->nombreChambres = $nombreChambres;

        return $this;
    }

    public function getNombreCouchages(): ?int
    {
        return $this->nombreCouchages;
    }

    public function setNombreCouchages(int $nombreCouchages): static
    {
        $this->nombreCouchages = $nombreCouchages;

        return $this;
    }

    public function isAccueilAnimaux(): ?bool
    {
        return $this->accueilAnimaux;
    }

    public function setAccueilAnimaux(bool $accueilAnimaux): static
    {
        $this->accueilAnimaux = $accueilAnimaux;

        return $this;
    }

    public function getTarifAnimaux(): ?string
    {
        return $this->tarifAnimaux;
    }

    public function setTarifAnimaux(string $tarifAnimaux): static
    {
        $this->tarifAnimaux = $tarifAnimaux;

        return $this;
    }

    public function getTarifLocation(): ?string
    {
        return $this->tarifLocation;
    }

    public function setTarifLocation(string $tarifLocation): static
    {
        $this->tarifLocation = $tarifLocation;

        return $this;
    }
}
