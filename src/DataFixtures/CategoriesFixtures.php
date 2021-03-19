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

class CategoriesFixtures extends Fixture
{
    private $manager;
    private $faker;


    public function __construct(){
        $this->faker=Factory::create("fr_FR");
        
    }


        
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
      
        
        
        
        $categories = [
            
            2 => [
                'libelle' => 'Verbe'
            ],
            3 => [
                'libelle' => 'Adjectif'
            ],
            4 => [
                'libelle' => 'Adverbe'
            ],
            5 => [
                'libelle' => 'Pronom'
            ],
            6 => [
                'libelle' => 'Déterminant'
            ],
            7 => [
                'libelle' => 'Nom propre'
            ],
            ];

            foreach($categories as $key => $value){
                $categorie = new Categorie();
                $categorie->setLibelle($value['libelle']);
                $manager->persist($categorie);

                //Enregistre la catégorie dans une référence
                //$this->addReference('categorieNC_' . $key, $categorie->getId());
            }

            $manager->flush();
        
    }



}
