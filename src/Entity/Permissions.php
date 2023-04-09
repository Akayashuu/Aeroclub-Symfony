<?php

namespace App\Entity;

use App\Repository\PermissionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PermissionsRepository::class)]
class Permissions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:"numMembres", referencedColumnName:'numMembres')]
    private ?Membres $numMembres = null;

    #[ORM\Column]
    private ?bool $isAdmin = null;

    #[ORM\Column]
    private ?bool $canWrite = null;

    #[ORM\Column]
    private ?bool $canRead = null;

    #[ORM\Column]
    private ?bool $canUpdate = null;

    #[ORM\Column]
    private ?bool $canDelete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumMembre(): ?Membres
    {
        return $this->numMembres;
    }

    public function setNumMembre(?Membres $numMembre): self
    {
        $this->numMembres = $numMembre;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function isCanWrite(): ?bool
    {
        return $this->canWrite;
    }

    public function setCanWrite(bool $canWrite): self
    {
        $this->canWrite = $canWrite;

        return $this;
    }

    public function isCanRead(): ?bool
    {
        return $this->canRead;
    }

    public function setCanRead(bool $canRead): self
    {
        $this->canRead = $canRead;

        return $this;
    }

    public function isCanUpdate(): ?bool
    {
        return $this->canUpdate;
    }

    public function setCanUpdate(bool $canUpdate): self
    {
        $this->canUpdate = $canUpdate;

        return $this;
    }

    public function isCanDelete(): ?bool
    {
        return $this->canDelete;
    }

    public function setCanDelete(bool $canDelete): self
    {
        $this->canDelete = $canDelete;

        return $this;
    }
}
