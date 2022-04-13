<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
class Suite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 80)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'string', length: 100)]
    private $url_booking;

    #[ORM\ManyToOne(targetEntity: Etablissement::class, inversedBy: 'suites')]
    /* #[ORM\JoinColumn(nullable: false)] */
    private $id_hotel;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo_principale;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo_deux;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo_3;

    #[ORM\Column(type: 'string', length: 95)]
    private $description_intro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getUrlBooking(): ?string
    {
        return $this->url_booking;
    }

    public function setUrlBooking(string $url_booking): self
    {
        $this->url_booking = $url_booking;

        return $this;
    }

    public function getIdHotel(): ?Etablissement
    {
        return $this->id_hotel;
    }

    public function setIdHotel(?Etablissement $id_hotel): self
    {
        $this->id_hotel = $id_hotel;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPhotoPrincipale(): ?string
    {
        return $this->photo_principale;
    }

    public function setPhotoPrincipale(string $photo_principale): self
    {
        $this->photo_principale = $photo_principale;

        return $this;
    }

    public function getPhotoDeux(): ?string
    {
        return $this->photo_deux;
    }

    public function setPhotoDeux(string $photo_deux): self
    {
        $this->photo_deux = $photo_deux;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo_3;
    }

    public function setPhoto3(string $photo_3): self
    {
        $this->photo_3 = $photo_3;

        return $this;
    }

    public function getDescriptionIntro(): ?string
    {
        return $this->description_intro;
    }

    public function setDescriptionIntro(string $description_intro): self
    {
        $this->description_intro = $description_intro;

        return $this;
    }
}
