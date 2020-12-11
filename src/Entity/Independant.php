<?php

namespace App\Entity;

use App\Repository\IndependantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IndependantRepository::class)
 */
class Independant
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
    private $numero_independant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroIndependant(): ?int
    {
        return $this->numero_independant;
    }

    public function setNumeroIndependant(int $numero_independant): self
    {
        $this->numero_independant = $numero_independant;

        return $this;
    }
}
