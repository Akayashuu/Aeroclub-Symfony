<?php

namespace App\Entity;

use App\Repository\InstructeursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstructeursRepository::class)]
class Instructeurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "numInstructeur")]
    private ?int $numInstructeur = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom = null;

    #[ORM\Column(name:"numcivil")]
    private ?string $numCivil = null;

    #[ORM\Column(name:"tauxinstructeur")]
    private ?float $tauxInstructeur = null;

    #[ORM\Column(length: 200)]
    private ?string $adresse = null;

    #[ORM\Column(length: 6, name:"codepostal")]
    private ?string $codePostal = null;

    #[ORM\Column(length: 30)]
    private ?string $ville = null;

    #[ORM\Column(length: 20)]
    private ?string $tel = null;

    #[ORM\Column(length: 20)]
    private ?string $fax = null;

    #[ORM\Column(length: 20)]
    private ?string $email = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numBadge", referencedColumnName:'numBadge')]
    private ?Badge $numBadge = null;

    public function getNumInstructeur(): ?int
    {
        return $this->numInstructeur;
    }

    public function setNumInstructeur(int $numInstructeur): self
    {
        $this->numInstructeur = $numInstructeur;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumCivil(): ?float
    {
        return $this->numCivil;
    }

    public function setNumCivil(float $numCivil): self
    {
        $this->numCivil = $numCivil;

        return $this;
    }

    public function getTauxInstructeur(): ?float
    {
        return $this->tauxInstructeur;
    }

    public function setTauxInstructeur(float $tauxInstructeur): self
    {
        $this->tauxInstructeur = $tauxInstructeur;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumBadge(): ?Badge
    {
        return $this->numBadge;
    }

    public function setNumBadge(?Badge $numBadge): self
    {
        $this->numBadge = $numBadge;

        return $this;
    }
}
