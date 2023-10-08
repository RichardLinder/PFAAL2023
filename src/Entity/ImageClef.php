<?php

namespace App\Entity;

use App\Repository\ImageClefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageClefRepository::class)]
class ImageClef
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $liens = null;

    #[ORM\ManyToOne(inversedBy: 'imageClefs')]
    private ?Clef $clef = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLiens(): ?string
    {
        return $this->liens;
    }

    public function setLiens(?string $liens): static
    {
        $this->liens = $liens;

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
