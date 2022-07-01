<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=messages::class, inversedBy="user")
     */
    private $mesaage;

    public function __construct()
    {
        $this->mesaage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, messages>
     */
    public function getMesaage(): Collection
    {
        return $this->mesaage;
    }

    public function addMesaage(messages $mesaage): self
    {
        if (!$this->mesaage->contains($mesaage)) {
            $this->mesaage[] = $mesaage;
        }

        return $this;
    }

    public function removeMesaage(messages $mesaage): self
    {
        $this->mesaage->removeElement($mesaage);

        return $this;
    }
}
