<?php

namespace App\Entity;

use \App\Entity\Formule;
use \App\Entity\Utilisateur;
use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?int $menuordre;

    #[ORM\ManyToOne(inversedBy: 'menu')]
    private ?Formule $formule = null;

    #[ORM\ManyToOne(inversedBy: 'menu')]
    private ?Utilisateur $idutilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMenuordre(): ?int
    {
        return $this->menuordre;
    }

    public function setmenuordre(int $menuordre): self
    {
        $this->menuordre = $menuordre;
    
        return $this;
    }

    public function getformule(): ?Formule
    {
        return $this->formule;
    }

    public function setformule(?Formule $formule): self
    {
        $this->formule = $formule;

        return $this;
    }

    public function getIdutilisateur(): ?Utilisateur
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(?Utilisateur $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }
}
