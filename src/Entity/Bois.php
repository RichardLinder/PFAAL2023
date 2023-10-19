<?php

namespace App\Entity;

use App\Repository\BoisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoisRepository::class)]
class Bois
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreBois = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionBois = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixBois = null;

    #[ORM\OneToMany(mappedBy: 'bois', targetEntity: Devis::class, orphanRemoval: true)]
    private Collection $deviss;

    public function __construct()
    {
        $this->deviss = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreBois(): ?string
    {
        return $this->titreBois;
    }

    public function setTitreBois(string $titreBois): static
    {
        $this->titreBois = $titreBois;

        return $this;
    }

    public function getDescriptionBois(): ?string
    {
        return $this->descriptionBois;
    }

    public function setDescriptionBois(?string $descriptionBois): static
    {
        $this->descriptionBois = $descriptionBois;

        return $this;
    }

    public function getPrixBois(): ?float
    {
        return $this->prixBois;
    }

    public function setPrixBois(?float $prixBois): static
    {
        $this->prixBois = $prixBois;

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
            $deviss->setBois($this);
        }

        return $this;
    }

    public function removeDeviss(Devis $deviss): static
    {
        if ($this->deviss->removeElement($deviss)) {
            // set the owning side to null (unless already changed)
            if ($deviss->getBois() === $this) {
                $deviss->setBois(null);
            }
        }

        return $this;
    }

    public function __tostring() {
        return $this->titreBois; 
        
    }
}
