<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $chemin;

    /**
     * @ORM\ManyToOne(targetEntity=VoitureOccasion::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voitureOccasion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(string $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }

    public function getVoitureOccasion(): ?VoitureOccasion
    {
        return $this->voitureOccasion;
    }

    public function setVoitureOccasion(?VoitureOccasion $voitureOccasion): self
    {
        $this->voitureOccasion = $voitureOccasion;

        return $this;
    }
}
