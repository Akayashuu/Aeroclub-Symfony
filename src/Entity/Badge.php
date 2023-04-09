<?php

namespace App\Entity;

use App\Repository\BadgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"numBadge")]
    private ?int $numBadge = null;

    #[ORM\Column(length: 80)]
    private ?string $badge = null;

    public function getNumBadge(): ?int
    {
        return $this->numBadge;
    }

    public function setNumBadge(int $numBadge): self
    {
        $this->numBadge = $numBadge;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(string $badge): self
    {
        $this->badge = $badge;

        return $this;
    }
}
