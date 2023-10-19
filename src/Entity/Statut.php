<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'Statut', targetEntity: Devis::class, orphanRemoval: true)]
    private Collection $deviss;

    public function __construct()
    {
        $this->deviss = new ArrayCollection();
        $this->libelle = "Début de la procedure";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

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
            $deviss->setStatut($this);
        }

        return $this;
    }

    public function removeDeviss(Devis $deviss): static
    {
        if ($this->deviss->removeElement($deviss)) {
            // set the owning side to null (unless already changed)
            if ($deviss->getStatut() === $this) {
                $deviss->setStatut(null);
            }
        }

        return $this;
    }
}
