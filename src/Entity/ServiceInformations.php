<?php

namespace App\Entity;

use App\Repository\ServiceInformationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceInformationsRepository::class)
 */
class ServiceInformations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $services;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(?string $services): self
    {
        $this->services = $services;

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

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }
}
