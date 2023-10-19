<?php

namespace App\Entity;

use App\Repository\MetalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'metal', targetEntity: Devis::class, orphanRemoval: true)]
    private Collection $deviss;

    public function __construct()
    {
        $this->deviss = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Devis>
     */
    public function getDeviss(): Collection
    {
        return $this->deviss;
    }

    public function addDeviss(Devis $deviss): static
    {
        if (!$this->deviss->contains($deviss)) {
            $this->deviss->add($deviss);
            $deviss->setMetal($this);
        }

        return $this;
    }

    public function removeDeviss(Devis $deviss): static
    {
        if ($this->deviss->removeElement($deviss)) {
            // set the owning side to null (unless already changed)
            if ($deviss->getMetal() === $this) {
                $deviss->setMetal(null);
            }
        }

        return $this;
    }

    public function __tostring() {
        return $this->titreMetal; 
        
    }
}
