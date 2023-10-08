<?php

namespace App\Entity;

use App\Repository\ClefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClefRepository::class)]
class Clef
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroDeSerie = null;

    #[ORM\Column(length: 255)]
    private ?string $metal = null;

    #[ORM\Column(length: 255)]
    private ?string $forme = null;

    #[ORM\Column(length: 255)]
    private ?string $bois = null;

    #[ORM\Column]
    private ?bool $esProduit = null;

    #[ORM\Column]
    private ?bool $esLivre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDeSerie(): ?string
    {
        return $this->numeroDeSerie;
    }

    public function setNumeroDeSerie(string $numeroDeSerie): static
    {
        $this->numeroDeSerie = $numeroDeSerie;

        return $this;
    }

    public function getMetal(): ?string
    {
        return $this->metal;
    }

    public function setMetal(string $metal): static
    {
        $this->metal = $metal;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->forme;
    }

    public function setForme(string $forme): static
    {
        $this->forme = $forme;

        return $this;
    }

    public function getBois(): ?string
    {
        return $this->bois;
    }

    public function setBois(string $bois): static
    {
        $this->bois = $bois;

        return $this;
    }

    public function isEsProduit(): ?bool
    {
        return $this->esProduit;
    }

    public function setEsProduit(bool $esProduit): static
    {
        $this->esProduit = $esProduit;

        return $this;
    }

    public function isEsLivre(): ?bool
    {
        return $this->esLivre;
    }

    public function setEsLivre(bool $esLivre): static
    {
        $this->esLivre = $esLivre;

        return $this;
    }
}
