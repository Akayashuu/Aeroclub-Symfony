<?php

namespace App\Entity;

use App\Repository\ComptesAcRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptesAcRepository::class)]
class ComptesAc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "numCompte")]
    private ?int $numCompte = null;

    #[ORM\Column(length: 200)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $debit = null;

    #[ORM\Column]
    private ?float $credit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numMembres", referencedColumnName:'numMembres')]
    private ?membres $numMembres = null;

    #[ORM\JoinColumn(nullable: false, name:"numSequence", referencedColumnName:'numSequence')]
    private ?Sequence $numSequence = null;

    public function getNumCompte(): ?int
    {
        return $this->numCompte;
    }

    public function setNumCompte(int $numCompte): self
    {
        $this->numCompte = $numCompte;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(float $debit): self
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(float $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getNumMembres(): ?membres
    {
        return $this->numMembres;
    }

    public function setNumMembres(?membres $numMembres): self
    {
        $this->numMembres = $numMembres;

        return $this;
    }

    public function getNumSequence(): ?Sequence
    {
        return $this->numSequence;
    }

    public function setNumSequence(?Sequence $numSequence): self
    {
        $this->numSequence = $numSequence;

        return $this;
    }
}
