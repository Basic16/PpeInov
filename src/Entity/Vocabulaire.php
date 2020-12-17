<?php

namespace App\Entity;

use App\Repository\VocabulaireRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=VocabulaireRepository::class)
 * @ApiResource()
 */
class Vocabulaire
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_en;

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

    public function getLibelleEn(): ?string
    {
        return $this->libelle_en;
    }

    public function setLibelleEn(string $libelle_en): self
    {
        $this->libelle_en = $libelle_en;

        return $this;
    }
}
