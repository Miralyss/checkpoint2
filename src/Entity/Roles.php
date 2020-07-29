<?php

namespace App\Entity;

use App\Repository\RolesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolesRepository::class)
 */
class Roles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assassin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paladin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssassin(): ?string
    {
        return $this->assassin;
    }

    public function setAssassin(string $assassin): self
    {
        $this->assassin = $assassin;

        return $this;
    }

    public function getMage(): ?string
    {
        return $this->mage;
    }

    public function setMage(string $mage): self
    {
        $this->mage = $mage;

        return $this;
    }

    public function getPaladin(): ?string
    {
        return $this->paladin;
    }

    public function setPaladin(string $paladin): self
    {
        $this->paladin = $paladin;

        return $this;
    }
}
