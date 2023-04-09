<?php

namespace App\Entity;

use App\Repository\SequenceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SequenceRepository::class)]
class Sequence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"numSequence")]
    private ?int $numSequence = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $temps = null;

    #[ORM\Column]
    private ?float $prixSpecial = null;

    #[ORM\Column]
    private ?float $taux = null;

    #[ORM\Column]
    private ?float $reductionSemaine = null;

    #[ORM\JoinColumn(nullable: false, name:"numMotif", referencedColumnName:'numMotif')]
    private ?int $numMotif = null;

    #[ORM\Column]
    private ?float $tauxInstructeur = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $forfaitInitialisation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numMembres", referencedColumnName:'numMembres')]
    private ?Membres $numMembres = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numInstructeur", referencedColumnName:'numInstructeur')]
    private ?Instructeurs $numInstructeur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numAvions", referencedColumnName:'numAvions')]
    private ?Avions $numAvions = null;

    public function getNumSequence(): ?int
    {
        return $this->numSequence;
    }

    public function setNumSequence(int $numSequence): self
    {
        $this->numSequence = $numSequence;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTemps(): ?int
    {
        return $this->temps;
    }

    public function setTemps(int $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getPrixSpecial(): ?float
    {
        return $this->prixSpecial;
    }

    public function setPrixSpecial(float $prixSpecial): self
    {
        $this->prixSpecial = $prixSpecial;

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

    public function getReductionSemaine(): ?float
    {
        return $this->reductionSemaine;
    }

    public function setReductionSemaine(float $reductionSemaine): self
    {
        $this->reductionSemaine = $reductionSemaine;

        return $this;
    }

    public function getNumMotif(): ?int
    {
        return $this->numMotif;
    }

    public function setNumMotif(int $numMotif): self
    {
        $this->numMotif = $numMotif;

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

    public function getForfaitInitialisation(): ?int
    {
        return $this->forfaitInitialisation;
    }

    public function setForfaitInitialisation(int $forfaitInitialisation): self
    {
        $this->forfaitInitialisation = $forfaitInitialisation;

        return $this;
    }

    public function getNumMembres(): ?Membres
    {
        return $this->numMembres;
    }

    public function setNumMembres(?Membres $numMembres): self
    {
        $this->numMembres = $numMembres;

        return $this;
    }

    public function getNumInstructeur(): ?Instructeurs
    {
        return $this->numInstructeur;
    }

    public function setNumInstructeur(?Instructeurs $numInstructeur): self
    {
        $this->numInstructeur = $numInstructeur;

        return $this;
    }

    public function getNumAvions(): ?Avions
    {
        return $this->numAvions;
    }

    public function setNumAvions(?Avions $numAvions): self
    {
        $this->numAvions = $numAvions;

        return $this;
    }
}
