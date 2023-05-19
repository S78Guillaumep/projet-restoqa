<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\ManyToOne(inversedBy: 'carte')]
    private ?Plat $idplat = null;

    #[ORM\ManyToOne(inversedBy: 'carte')]
    private ?Administrateur $idadminstrateur = null;

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

    public function getIdplat(): ?Plat
    {
        return $this->idplat;
    }

    public function setIdplat(?Plat $idplat): self
    {
        $this->idplat = $idplat;

        return $this;
    }

    public function getIdadminstrateur(): ?Administrateur
    {
        return $this->idadminstrateur;
    }

    public function setIdadminstrateur(?Administrateur $idadminstrateur): self
    {
        $this->idadminstrateur = $idadminstrateur;

        return $this;
    }
}
