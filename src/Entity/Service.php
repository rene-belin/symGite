<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $locationLinge = null;

    #[ORM\Column]
    private ?bool $menageFinSejour = null;

    #[ORM\Column]
    private ?bool $accesInternet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLocationLinge(): ?bool
    {
        return $this->locationLinge;
    }

    public function setLocationLinge(bool $locationLinge): static
    {
        $this->locationLinge = $locationLinge;

        return $this;
    }

    public function isMenageFinSejour(): ?bool
    {
        return $this->menageFinSejour;
    }

    public function setMenageFinSejour(bool $menageFinSejour): static
    {
        $this->menageFinSejour = $menageFinSejour;

        return $this;
    }

    public function isAccesInternet(): ?bool
    {
        return $this->accesInternet;
    }

    public function setAccesInternet(bool $accesInternet): static
    {
        $this->accesInternet = $accesInternet;

        return $this;
    }
}
