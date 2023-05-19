<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Administrateur $idadministrateur = null;

    #[ORM\OneToMany(mappedBy: 'idphoto', targetEntity: Galerie::class)]
    private Collection $galerie;

    public function __construct()
    {
        $this->galerie = new ArrayCollection();
    }

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdadministrateur(): ?Administrateur
    {
        return $this->idadministrateur;
    }

    public function setIdadministrateur(?Administrateur $idadministrateur): self
    {
        $this->idadministrateur = $idadministrateur;

        return $this;
    }

    /**
     * @return Collection<int, Galerie>
     */
    public function getGalerie(): Collection
    {
        return $this->galerie;
    }

    public function addGalerie(Galerie $galerie): self
    {
        if (!$this->galerie->contains($galerie)) {
            $this->galerie->add($galerie);
            $galerie->setIdphoto($this);
        }

        return $this;
    }

    public function removeGalerie(Galerie $galerie): self
    {
        if ($this->galerie->removeElement($galerie)) {
            // set the owning side to null (unless already changed)
            if ($galerie->getIdphoto() === $this) {
                $galerie->setIdphoto(null);
            }
        }

        return $this;
    }
}
