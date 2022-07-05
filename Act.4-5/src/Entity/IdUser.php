<?php

namespace App\Entity;

use App\Repository\IdUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdUserRepository::class)
 */
class IdUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $Montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

  
    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_de_Telephone_Mobile_Tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->Montant;
    }

    public function setMontant(float $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }


    public function getNumeroDeTelephoneMobileTel(): ?int
    {
        return $this->Numero_de_Telephone_Mobile_Tel;
    }

    public function setNumeroDeTelephoneMobileTel(int $Numero_de_Telephone_Mobile_Tel): self
    {
        $this->Numero_de_Telephone_Mobile_Tel = $Numero_de_Telephone_Mobile_Tel;

        return $this;
    }
}
