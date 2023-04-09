<?php

namespace App\Entity;

use App\Repository\AvionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvionsRepository::class)]
class Avions
{
    #[ORM\Id]
    #[ORM\GeneratedValue("AUTO")]
    #[ORM\Column(name: "numavions")]
    private ?int $numAvions = null;

    #[ORM\Column(length: 50)]
    private ?string $type_avion = null;

    #[ORM\Column]
    private ?float $taux = null;

    #[ORM\Column]
    private ?float $forfait1 = null;

    #[ORM\Column]
    private ?float $forfait2 = null;

    #[ORM\Column]
    private ?float $forfait3 = null;

    #[ORM\Column]
    private ?float $heures_forfait1 = null;

    #[ORM\Column]
    private ?float $heures_forfait2 = null;

    #[ORM\Column]
    private ?float $heures_forfait3 = null;

    #[ORM\Column]
    private ?float $reduction_semaine = null;

    #[ORM\Column(length: 50)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 50)]
    private ?string $image = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    public function getNumAvions(): ?int
    {
        return $this->numAvions;
    }

    public function setNumAvions(int $numAvions): self
    {
        $this->numAvions = $numAvions;

        return $this;
    }

    public function getTypeAvion(): ?string
    {
        return $this->type_avion;
    }

    public function setTypeAvion(string $type_avion): self
    {
        $this->type_avion = $type_avion;

        return $this;
    }

    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getForfait1(): ?float
    {
        return $this->forfait1;
    }

    public function setForfait1(float $forfait1): self
    {
        $this->forfait1 = $forfait1;

        return $this;
    }

    public function getForfait2(): ?float
    {
        return $this->forfait2;
    }

    public function setForfait2(float $forfait2): self
    {
        $this->forfait2 = $forfait2;

        return $this;
    }

    public function getForfait3(): ?float
    {
        return $this->forfait3;
    }

    public function setForfait3(float $forfait3): self
    {
        $this->forfait3 = $forfait3;

        return $this;
    }

    public function getHeuresForfait1(): ?float
    {
        return $this->heures_forfait1;
    }

    public function setHeuresForfait1(float $heures_forfait1): self
    {
        $this->heures_forfait1 = $heures_forfait1;

        return $this;
    }

    public function getHeuresForfait2(): ?float
    {
        return $this->heures_forfait2;
    }

    public function setHeuresForfait2(float $heures_forfait2): self
    {
        $this->heures_forfait2 = $heures_forfait2;

        return $this;
    }

    public function getHeuresForfait3(): ?float
    {
        return $this->heures_forfait3;
    }

    public function setHeuresForfait3(float $heures_forfait3): self
    {
        $this->heures_forfait3 = $heures_forfait3;

        return $this;
    }

    public function getReductionSemaine(): ?float
    {
        return $this->reduction_semaine;
    }

    public function setReductionSemaine(float $reduction_semaine): self
    {
        $this->reduction_semaine = $reduction_semaine;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
