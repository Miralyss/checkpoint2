<?php

namespace App\Entity;

use App\Repository\RolesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, mappedBy="roles")
     */
    private $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

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

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->addRole($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            $character->removeRole($this);
        }

        return $this;
    }
}
