<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $jour = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $ouverture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fermeture = null;

    #[ORM\ManyToOne]
    private ?Utilisateur $idutilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOuverture(): ?\DateTimeInterface
    {
        return $this->ouverture;
    }

    public function setOuverture(\DateTimeInterface $ouverture): self
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    public function getFermeture(): ?\DateTimeInterface
    {
        return $this->fermeture;
    }

    public function setFermeture(\DateTimeInterface $fermeture): self
    {
        $this->fermeture = $fermeture;

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
