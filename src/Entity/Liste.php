<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeRepository::class)
 */
class Liste
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
    private $mots;

    /**
     * @ORM\ManyToMany(targetEntity=Vocabulaire::class, inversedBy="listes")
     */
    private $idvocabulaire;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="listes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idtheme;

    public function __construct()
    {
        $this->idvocabulaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMots(): ?string
    {
        return $this->mots;
    }

    public function setMots(string $mots): self
    {
        $this->mots = $mots;

        return $this;
    }

    /**
     * @return Collection|Vocabulaire[]
     */
    public function getIdvocabulaire(): Collection
    {
        return $this->idvocabulaire;
    }

    public function addIdvocabulaire(Vocabulaire $idvocabulaire): self
    {
        if (!$this->idvocabulaire->contains($idvocabulaire)) {
            $this->idvocabulaire[] = $idvocabulaire;
        }

        return $this;
    }

    public function removeIdvocabulaire(Vocabulaire $idvocabulaire): self
    {
        $this->idvocabulaire->removeElement($idvocabulaire);

        return $this;
    }

    public function getIdtheme(): ?Theme
    {
        return $this->idtheme;
    }

    public function setIdtheme(?Theme $idtheme): self
    {
        $this->idtheme = $idtheme;

        return $this;
    }
}
