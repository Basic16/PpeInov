<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 * @ApiResource()
 */
class Theme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Test::class, mappedBy="theme")
     */
    private $tests;

    /**
     * @ORM\ManyToMany(targetEntity=Vocabulaire::class, inversedBy="themes")
     */
    private $vocabulaire;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->vocabulaire = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Test[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->setTheme($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getTheme() === $this) {
                $test->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vocabulaire[]
     */
    public function getVocabulaire(): Collection
    {
        return $this->vocabulaire;
    }

    public function addVocabulaire(Vocabulaire $vocabulaire): self
    {
        if (!$this->vocabulaire->contains($vocabulaire)) {
            $this->vocabulaire[] = $vocabulaire;
        }

        return $this;
    }

    public function removeVocabulaire(Vocabulaire $vocabulaire): self
    {
        $this->vocabulaire->removeElement($vocabulaire);

        return $this;
    }

  
    
   

   
}
