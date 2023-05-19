<?php

namespace App\Entity;

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

    #[ORM\ManyToOne(inversedBy: 'menu')]
    private ?Formule $idformule = null;

    #[ORM\ManyToOne(inversedBy: 'menu')]
    private ?Administrateur $idaministrateur = null;

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

    public function getIdformule(): ?Formule
    {
        return $this->idformule;
    }

    public function setIdformule(?Formule $idformule): self
    {
        $this->idformule = $idformule;

        return $this;
    }

    public function getIdaministrateur(): ?Administrateur
    {
        return $this->idaministrateur;
    }

    public function setIdaministrateur(?Administrateur $idaministrateur): self
    {
        $this->idaministrateur = $idaministrateur;

        return $this;
    }
}
