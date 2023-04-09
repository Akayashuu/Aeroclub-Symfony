<?php

namespace App\Entity;

use App\Repository\MotifsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotifsRepository::class)]
class Motifs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"numMotif")]
    private ?int $numMotif = null;

    #[ORM\Column(length: 80)]
    private ?string $motif = null;

    public function getNumMotif(): ?int
    {
        return $this->numMotif;
    }

    public function setNumMotif(int $numMotif): self
    {
        $this->numMotif = $numMotif;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }
}
