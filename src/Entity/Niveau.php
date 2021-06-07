<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Libelle;

    /**
     * @ORM\OneToMany(targetEntity=Vocabulaire::class, mappedBy="niveau")
     */
    private $vocabulaires;

    public function __construct()
    {
        $this->vocabulaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * @return Collection|Vocabulaire[]
     */
    public function getVocabulaires(): Collection
    {
        return $this->vocabulaires;
    }

    public function addVocabulaire(Vocabulaire $vocabulaire): self
    {
        if (!$this->vocabulaires->contains($vocabulaire)) {
            $this->vocabulaires[] = $vocabulaire;
            $vocabulaire->setNiveau($this);
        }

        return $this;
    }

    public function removeVocabulaire(Vocabulaire $vocabulaire): self
    {
        if ($this->vocabulaires->removeElement($vocabulaire)) {
            // set the owning side to null (unless already changed)
            if ($vocabulaire->getNiveau() === $this) {
                $vocabulaire->setNiveau(null);
            }
        }

        return $this;
    }
}
