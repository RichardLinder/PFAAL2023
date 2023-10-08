<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreArticl = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textArticle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titreImageArticle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienImageArticle = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticl(): ?string
    {
        return $this->titreArticl;
    }

    public function setTitreArticl(string $titreArticl): static
    {
        $this->titreArticl = $titreArticl;

        return $this;
    }

    public function getTextArticle(): ?string
    {
        return $this->textArticle;
    }

    public function setTextArticle(?string $textArticle): static
    {
        $this->textArticle = $textArticle;

        return $this;
    }

    public function getTitreImageArticle(): ?string
    {
        return $this->titreImageArticle;
    }

    public function setTitreImageArticle(?string $titreImageArticle): static
    {
        $this->titreImageArticle = $titreImageArticle;

        return $this;
    }

    public function getLienImageArticle(): ?string
    {
        return $this->lienImageArticle;
    }

    public function setLienImageArticle(?string $lienImageArticle): static
    {
        $this->lienImageArticle = $lienImageArticle;

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
}
