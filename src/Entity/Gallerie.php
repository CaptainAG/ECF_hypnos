<?php

namespace App\Entity;

use App\Repository\GallerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GallerieRepository::class)]
class Gallerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\OneToOne(mappedBy: 'galerie', targetEntity: Suite::class, cascade: ['persist', 'remove'])]
    private $suite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSuite(): ?Suite
    {
        return $this->suite;
    }

    public function setSuite(?Suite $suite): self
    {
        // unset the owning side of the relation if necessary
        if ($suite === null && $this->suite !== null) {
            $this->suite->setGalerie(null);
        }

        // set the owning side of the relation if necessary
        if ($suite !== null && $suite->getGalerie() !== $this) {
            $suite->setGalerie($this);
        }

        $this->suite = $suite;

        return $this;
    }
}
