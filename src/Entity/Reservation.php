<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $scheduledAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:"numMembres", referencedColumnName:'numMembres', nullable:false)]
    private ?Membres $numMembres = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:"numavions", referencedColumnName:'numavions', nullable:false)]
    private ?Avions $numavions = null;

    #[ORM\Column(options:["default"=> "CURRENT_TIMESTAMP"])]
    private ?\DateTime $createdAt = null;

    #[ORM\Column]
    private ?\DateTime $endAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheduledAt(): ?\DateTime
    {
        return $this->scheduledAt;
    }

    public function setScheduledAt(\DateTime $scheduledAt): self
    {
        $this->scheduledAt = $scheduledAt;

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

    public function getnumavions(): ?Avions
    {
        return $this->numavions;
    }

    public function setnumavions(?Avions $numavions): self
    {
        $this->numavions = $numavions;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEndAt(): ?\DateTime
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTime $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }
}
