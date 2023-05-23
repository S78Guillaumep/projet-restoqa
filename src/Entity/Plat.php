<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreplat = null;

    #[ORM\OneToMany(mappedBy: 'idplat', targetEntity: Carte::class)]
    private Collection $carte;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function __construct()
    { 
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreplat(): ?string
    {
        return $this->titreplat;
    }

    public function setTitreplat(string $titreplat): self
    {
        $this->titreplat = $titreplat;

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
    
    /**
     * @return Collection<int, Carte>
     */
    public function getCarte(): Collection
    {
        return $this->carte;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->carte->contains($carte)) {
            $this->carte->add($carte);
            $carte->setIdplat($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->carte->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getIdplat() === $this) {
                $carte->setIdplat(null);
            }
        }

        return $this;
    }
}
