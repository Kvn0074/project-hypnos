<?php

namespace App\Entity;

use App\Repository\GerantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GerantRepository::class)]
class Gerant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: Compte::class, cascade: ['persist', 'remove'])]
    private $id_compte;

    #[ORM\OneToOne(targetEntity: Etablissement::class, cascade: ['persist', 'remove'])]
    private $id_hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompte(): ?Compte
    {
        return $this->id_compte;
    }

    public function setIdCompte(?Compte $id_compte): self
    {
        $this->id_compte = $id_compte;

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
