<?php

namespace App\Entity;

use App\Repository\EquipementInterieurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementInterieurRepository::class)]
class EquipementInterieur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $laveVaiselle = null;

    #[ORM\Column]
    private ?bool $laveLinge = null;

    #[ORM\Column]
    private ?bool $climatisation = null;

    #[ORM\Column]
    private ?bool $television = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLaveVaiselle(): ?bool
    {
        return $this->laveVaiselle;
    }

    public function setLaveVaiselle(bool $laveVaiselle): static
    {
        $this->laveVaiselle = $laveVaiselle;

        return $this;
    }

    public function isLaveLinge(): ?bool
    {
        return $this->laveLinge;
    }

    public function setLaveLinge(bool $laveLinge): static
    {
        $this->laveLinge = $laveLinge;

        return $this;
    }

    public function isClimatisation(): ?bool
    {
        return $this->climatisation;
    }

    public function setClimatisation(bool $climatisation): static
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    public function isTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(bool $television): static
    {
        $this->television = $television;

        return $this;
    }
}
