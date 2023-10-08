<?php

namespace App\Entity;

use App\Repository\FormeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormeRepository::class)]
class Forme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreForme = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionForme = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixforme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreForme(): ?string
    {
        return $this->titreForme;
    }

    public function setTitreForme(string $titreForme): static
    {
        $this->titreForme = $titreForme;

        return $this;
    }

    public function getDescriptionForme(): ?string
    {
        return $this->descriptionForme;
    }

    public function setDescriptionForme(?string $descriptionForme): static
    {
        $this->descriptionForme = $descriptionForme;

        return $this;
    }

    public function getPrixforme(): ?float
    {
        return $this->prixforme;
    }

    public function setPrixforme(?float $prixforme): static
    {
        $this->prixforme = $prixforme;

        return $this;
    }
}
