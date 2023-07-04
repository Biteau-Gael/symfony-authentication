<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureOccasionRepository")
 */
class VoitureOccasion
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
private $marque;

/**
* @ORM\Column(type="string", length=255)
*/
private $modele;

/**
* @ORM\Column(type="integer")
*/
private $annee;

/**
* @ORM\Column(type="decimal", precision=10, scale=0)
*/
private $prix;

/**
* @ORM\Column(type="integer")
*/
private $Kilometre;

/**
* @ORM\OneToMany(targetEntity=Image::class, mappedBy="voitureOccasion", cascade={"persist", "remove"})
*/
private $images;

public function __construct()
{
$this->images = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getMarque(): ?string
{
return $this->marque;
}

public function setMarque(string $marque): self
{
$this->marque = $marque;

return $this;
}

public function getModele(): ?string
{
return $this->modele;
}

public function setModele(string $modele): self
{
$this->modele = $modele;

return $this;
}

public function getAnnee(): ?int
{
return $this->annee;
}

public function setAnnee(int $annee): self
{
$this->annee = $annee;

return $this;
}

public function getPrix(): ?string
{
return $this->prix;
}

public function setPrix(string $prix): self
{
$this->prix = $prix;

return $this;
}

public function getKilometre(): ?int
{
return $this->Kilometre;
}

public function setKilometre(int $Kilometre): self
{
$this->Kilometre = $Kilometre;

return $this;
}

/**
* @return Collection|Image[]
*/
public function getImages(): Collection
{
return $this->images;
}

public function addImage(Image $image): self
{
if (!$this->images->contains($image)) {
$this->images[] = $image;
$image->setVoitureOccasion($this);
}

return $this;
}

public function removeImage(Image $image): self
{
if ($this->images->removeElement($image)) {
// set the owning side to null (unless already changed)
if ($image->getVoitureOccasion() === $this) {
$image->setVoitureOccasion(null);
}
}

return $this;
}

// ...
}
