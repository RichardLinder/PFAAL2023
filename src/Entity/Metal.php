<?php

namespace App\Entity;

use App\Repository\MetalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetalRepository::class)]
class Metal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreMetal = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionMetal = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixMetal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreMetal(): ?string
    {
        return $this->titreMetal;
    }

    public function setTitreMetal(string $titreMetal): static
    {
        $this->titreMetal = $titreMetal;

        return $this;
    }

    public function getDescriptionMetal(): ?string
    {
        return $this->descriptionMetal;
    }

    public function setDescriptionMetal(?string $descriptionMetal): static
    {
        $this->descriptionMetal = $descriptionMetal;

        return $this;
    }

    public function getPrixMetal(): ?float
    {
        return $this->prixMetal;
    }

    public function setPrixMetal(?float $prixMetal): static
    {
        $this->prixMetal = $prixMetal;

        return $this;
    }
}
