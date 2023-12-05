<?php

namespace App\Entity;

use App\Repository\EquipementExterieurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementExterieurRepository::class)]
class EquipementExterieur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $terrasse = null;

    #[ORM\Column]
    private ?bool $barbecue = null;

    #[ORM\Column]
    private ?bool $piscinePrivee = null;

    #[ORM\Column]
    private ?bool $piscinePartagee = null;

    #[ORM\Column]
    private ?bool $tennis = null;

    #[ORM\Column]
    private ?bool $pingPong = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTerrasse(): ?bool
    {
        return $this->terrasse;
    }

    public function setTerrasse(bool $terrasse): static
    {
        $this->terrasse = $terrasse;

        return $this;
    }

    public function isBarbecue(): ?bool
    {
        return $this->barbecue;
    }

    public function setBarbecue(bool $barbecue): static
    {
        $this->barbecue = $barbecue;

        return $this;
    }

    public function isPiscinePrivee(): ?bool
    {
        return $this->piscinePrivee;
    }

    public function setPiscinePrivee(bool $piscinePrivee): static
    {
        $this->piscinePrivee = $piscinePrivee;

        return $this;
    }

    public function isPiscinePartagee(): ?bool
    {
        return $this->piscinePartagee;
    }

    public function setPiscinePartagee(bool $piscinePartagee): static
    {
        $this->piscinePartagee = $piscinePartagee;

        return $this;
    }

    public function isTennis(): ?bool
    {
        return $this->tennis;
    }

    public function setTennis(bool $tennis): static
    {
        $this->tennis = $tennis;

        return $this;
    }

    public function isPingPong(): ?bool
    {
        return $this->pingPong;
    }

    public function setPingPong(bool $pingPong): static
    {
        $this->pingPong = $pingPong;

        return $this;
    }
}
