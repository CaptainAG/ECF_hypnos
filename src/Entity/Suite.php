<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */


class Suite
{
    /**
* @ORM\Id
    * @ORM\GeneratedValue
* @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;


    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="suite")
     */
    private $hotel;

    /**
     * @ORM\OneToMany(mappedBy="Suite", targetEntity=Gallerie::class)
     */
    private $galerie;

    /**
     * @Vich\UploadableField(mapping="suite", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private ?File $imageFile = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $imageName = null;


    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @ORM\OneToMany(mappedBy="suite", targetEntity=Reservation::class)
     */
    private $reservations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;


    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->galerie = new ArrayCollection();
        $this->updatedAt = new \Datetime();
        $this->reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }



    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * @return Collection<int, Gallerie>
     */
    public function getGalerie(): Collection
    {
        return $this->galerie;
    }

    public function addGalerie(Gallerie $galerie): self
    {
        if (!$this->galerie->contains($galerie)) {
            $this->galerie[] = $galerie;
            $galerie->setSuite($this);
        }

        return $this;
    }

    public function removeGalerie(Gallerie $galerie): self
    {
        if ($this->galerie->removeElement($galerie)) {
            // set the owning side to null (unless already changed)
            if ($galerie->getSuite() === $this) {
                $galerie->setSuite(null);
            }
        }

        return $this;
    }

     /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setSuite($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSuite() === $this) {
                $reservation->setSuite(null);
            }
        }

        return $this;
    }





    public function __toString(): string
    {
        return $this->title;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }


}
