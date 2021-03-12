<?php

namespace App\DataFixtures;

use App\Entity\Abonnement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Categorie;
use App\Entity\Theme;
use App\Entity\Vocabulaire;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ThemesFixtures extends Fixture
{
    private $manager;
    private $faker;


    public function __construct(){
        $this->faker=Factory::create("fr_FR");
        
    }

  
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        
        $themes = [
            1 => [
                'libelle' => 'Fruits'
            ],
            2 => [
                'libelle' => 'Animaux'
            ],
            3 => [
                'libelle' => 'Corp humain'
            ],
            4 => [
                'libelle' => 'Maison'
            ],
            5 => [
                'libelle' => 'Sport'
            ],
            6 => [
                'libelle' => 'Informatique'
            ],
            7 => [
                'libelle' => 'Ecole'
            ],
            8 => [
                'libelle' => 'Couleurs'
            ],
            9 => [
                'libelle' => 'Nombres'
            ],
            10 => [
                'libelle' => 'Ville'
            ],
            ];

            foreach($themes as $key => $value){
                $theme = new Theme();
                $theme->setLibelle($value['libelle']);
                $manager->persist($theme);
            }

            $manager->flush();
        
    }



}