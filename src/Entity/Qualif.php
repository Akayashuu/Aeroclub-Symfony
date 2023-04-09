<?php

namespace App\Entity;

use App\Repository\QualifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualifRepository::class)]
class Qualif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"numQualif")]
    private ?int $numQualif = null;

    #[ORM\Column(length: 5)]
    private ?string $qualif = null;

    public function getNumQualif(): ?int
    {
        return $this->numQualif;
    }

    public function setNumQualif(int $numQualif): self
    {
        $this->numQualif = $numQualif;

        return $this;
    }

    public function getQualif(): ?string
    {
        return $this->qualif;
    }

    public function setQualif(string $qualif): self
    {
        $this->qualif = $qualif;

        return $this;
    }
}
