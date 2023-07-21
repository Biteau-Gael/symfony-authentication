<?php

namespace App\Entity;

use App\Repository\HorairesOuverturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HorairesOuverturesRepository::class)
 */
class HorairesOuvertures
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
    private $Jour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ouverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fermeture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->Jour;
    }

    public function setJour(string $Jour): self
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getOuverture(): ?string
    {
        return $this->Ouverture;
    }

    public function setOuverture(string $Ouverture): self
    {
        $this->Ouverture = $Ouverture;

        return $this;
    }

    public function getFermeture(): ?string
    {
        return $this->Fermeture;
    }

    public function setFermeture(string $Fermeture): self
    {
        $this->Fermeture = $Fermeture;

        return $this;
    }
}
