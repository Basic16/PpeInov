<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
    private $numero_entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroEntreprise(): ?int
    {
        return $this->numero_entreprise;
    }

    public function setNumeroEntreprise(int $numero_entreprise): self
    {
        $this->numero_entreprise = $numero_entreprise;

        return $this;
    }
}
