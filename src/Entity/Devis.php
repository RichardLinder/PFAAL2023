<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $typeSerrure = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionSerrure = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NumerosDeSerieSerrure = null;

    #[ORM\Column]
    private ?bool $esAccepter = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixBase = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $detaillSuplementaire = null;

    #[ORM\ManyToOne(inversedBy: 'deviss')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Utilisateur $Utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'deviss')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bois $bois = null;

    #[ORM\ManyToOne(inversedBy: 'deviss')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Metal $metal = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Forme $Forme = null;

    #[ORM\ManyToOne(inversedBy: 'deviss')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Statut $Statut = null;

    #[ORM\OneToOne(inversedBy: 'devis', cascade: ['persist', 'remove'])]
    private ?Clef $clef = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTypeSerrure(): ?string
    {
        return $this->typeSerrure;
    }

    public function setTypeSerrure(string $typeSerrure): static
    {
        $this->typeSerrure = $typeSerrure;

        return $this;
    }

    public function getDescriptionSerrure(): ?string
    {
        return $this->descriptionSerrure;
    }

    public function setDescriptionSerrure(?string $descriptionSerrure): static
    {
        $this->descriptionSerrure = $descriptionSerrure;

        return $this;
    }

    public function getNumerosDeSerieSerrure(): ?string
    {
        return $this->NumerosDeSerieSerrure;
    }

    public function setNumerosDeSerieSerrure(?string $NumerosDeSerieSerrure): static
    {
        $this->NumerosDeSerieSerrure = $NumerosDeSerieSerrure;

        return $this;
    }

    public function isEsAccepter(): ?bool
    {
        return $this->esAccepter;
    }

    public function setEsAccepter(bool $esAccepter): static
    {
        $this->esAccepter = $esAccepter;

        return $this;
    }

    public function getPrixBase(): ?float
    {
        return $this->prixBase;
    }

    public function setPrixBase(?float $prixBase): static
    {
        $this->prixBase = $prixBase;

        return $this;
    }

    public function getDetaillSuplementaire(): ?string
    {
        return $this->detaillSuplementaire;
    }

    public function setDetaillSuplementaire(?string $detaillSuplementaire): static
    {
        $this->detaillSuplementaire = $detaillSuplementaire;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): static
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    public function getBois(): ?Bois
    {
        return $this->bois;
    }

    public function setBois(?Bois $bois): static
    {
        $this->bois = $bois;

        return $this;
    }

    public function getMetal(): ?Metal
    {
        return $this->metal;
    }

    public function setMetal(?Metal $metal): static
    {
        $this->metal = $metal;

        return $this;
    }

    public function getForme(): ?Forme
    {
        return $this->Forme;
    }

    public function setForme(?Forme $Forme): static
    {
        $this->Forme = $Forme;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->Statut;
    }

    public function setStatut(?Statut $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getClef(): ?Clef
    {
        return $this->clef;
    }

    public function setClef(?Clef $clef): static
    {
        $this->clef = $clef;

        return $this;
    }
}
