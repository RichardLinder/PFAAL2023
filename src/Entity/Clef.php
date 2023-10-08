<?php

namespace App\Entity;

use App\Repository\ClefRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToOne(mappedBy: 'clef', cascade: ['persist', 'remove'])]
    private ?Devis $devis = null;

    #[ORM\OneToMany(mappedBy: 'clef', targetEntity: ImageClef::class)]
    private Collection $imageClefs;

    public function __construct()
    {
        $this->imageClefs = new ArrayCollection();
    }

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

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(?Devis $devis): static
    {
        // unset the owning side of the relation if necessary
        if ($devis === null && $this->devis !== null) {
            $this->devis->setClef(null);
        }

        // set the owning side of the relation if necessary
        if ($devis !== null && $devis->getClef() !== $this) {
            $devis->setClef($this);
        }

        $this->devis = $devis;

        return $this;
    }

    /**
     * @return Collection<int, ImageClef>
     */
    public function getImageClefs(): Collection
    {
        return $this->imageClefs;
    }

    public function addImageClef(ImageClef $imageClef): static
    {
        if (!$this->imageClefs->contains($imageClef)) {
            $this->imageClefs->add($imageClef);
            $imageClef->setClef($this);
        }

        return $this;
    }

    public function removeImageClef(ImageClef $imageClef): static
    {
        if ($this->imageClefs->removeElement($imageClef)) {
            // set the owning side to null (unless already changed)
            if ($imageClef->getClef() === $this) {
                $imageClef->setClef(null);
            }
        }

        return $this;
    }
}
