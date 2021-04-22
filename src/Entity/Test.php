<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 * @ApiResource()
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
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="test")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="tests")
     */
    private $theme;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse10;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTest($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeTest($this);
        }

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getReponse1(): ?string
    {
        return $this->reponse1;
    }

    public function setReponse1(string $reponse1): self
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    public function getReponse2(): ?string
    {
        return $this->reponse2;
    }

    public function setReponse2(string $reponse2): self
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    public function getReponse3(): ?string
    {
        return $this->reponse3;
    }

    public function setReponse3(string $reponse3): self
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->reponse4;
    }

    public function setReponse4(string $reponse4): self
    {
        $this->reponse4 = $reponse4;

        return $this;
    }

    public function getReponse5(): ?string
    {
        return $this->reponse5;
    }

    public function setReponse5(string $reponse5): self
    {
        $this->reponse5 = $reponse5;

        return $this;
    }

    public function getReponse6(): ?string
    {
        return $this->reponse6;
    }

    public function setReponse6(string $reponse6): self
    {
        $this->reponse6 = $reponse6;

        return $this;
    }

    public function getReponse7(): ?string
    {
        return $this->reponse7;
    }

    public function setReponse7(string $reponse7): self
    {
        $this->reponse7 = $reponse7;

        return $this;
    }

    public function getReponse8(): ?string
    {
        return $this->reponse8;
    }

    public function setReponse8(string $reponse8): self
    {
        $this->reponse8 = $reponse8;

        return $this;
    }

    public function getReponse9(): ?string
    {
        return $this->reponse9;
    }

    public function setReponse9(string $reponse9): self
    {
        $this->reponse9 = $reponse9;

        return $this;
    }

    public function getReponse10(): ?string
    {
        return $this->reponse10;
    }

    public function setReponse10(string $reponse10): self
    {
        $this->reponse10 = $reponse10;

        return $this;
    }

   
  
}
