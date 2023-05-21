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

    #[ORM\Column(type: Types::BLOB, nullable:true)]
    private $image;

    #[ORM\ManyToOne(inversedBy: 'photo')]
    private ?Utilisateur $idutilisateur = null;

    #[ORM\OneToMany(mappedBy: 'idphoto', targetEntity: Galerie::class)]
    private Collection $galerie;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

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

    public function getidutilisateur(): ?Utilisateur
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(?Utilisateur $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
