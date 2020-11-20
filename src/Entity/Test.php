<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, mappedBy="passer")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="tests")
     */
    private $idtheme;

    /**
     * @ORM\ManyToOne(targetEntity=Resultat::class, inversedBy="tests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idresultat;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addPasser($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removePasser($this);
        }

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

    public function getIdresultat(): ?Resultat
    {
        return $this->idresultat;
    }

    public function setIdresultat(?Resultat $idresultat): self
    {
        $this->idresultat = $idresultat;

        return $this;
    }
}
