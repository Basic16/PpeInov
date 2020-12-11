<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichierRepository::class)
 */
class Fichier
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
    private $photo_profil;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoProfil()
    {
        return $this->photo_profil;
    }

    public function setPhotoProfil( $photo_profil)
    {
        $this->photo_profil = $photo_profil;

        return $this;
    }



}
