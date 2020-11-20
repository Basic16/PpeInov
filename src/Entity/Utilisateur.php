<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $datedenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateinscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=Abonnement::class, mappedBy="idutilisateur")
     */
    private $abonnements;

    /**
     * @ORM\ManyToMany(targetEntity=Test::class, inversedBy="utilisateurs")
     */
    private $passer;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
        $this->passer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDatedenaissance(): ?string
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(string $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getDateinscription(): ?string
    {
        return $this->dateinscription;
    }

    public function setDateinscription(string $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|Abonnement[]
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setIdutilisateur($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getIdutilisateur() === $this) {
                $abonnement->setIdutilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Test[]
     */
    public function getPasser(): Collection
    {
        return $this->passer;
    }

    public function addPasser(Test $passer): self
    {
        if (!$this->passer->contains($passer)) {
            $this->passer[] = $passer;
        }

        return $this;
    }

    public function removePasser(Test $passer): self
    {
        $this->passer->removeElement($passer);

        return $this;
    }
}
