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
    private $id_hotel;

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
}
