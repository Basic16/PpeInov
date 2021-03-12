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
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class VocabulairesFixtures extends Fixture 
{
    
    private $manager;
    private $faker;


    public function __construct(){
        $this->faker=Factory::create("fr_FR");
        
    }


        
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
      
        //$categorie = $this->getReference('categorieNC_1');

        
        
        
        $vocabulaires = [
            1 => [
                'libelle' => 'Cerise',
                'libelle_en' => 'Cherry'
            ],
            2 => [
                'libelle' => 'Banane',
                'libelle_en' => 'Banana'
            ],
            3 => [
                'libelle' => 'Pomme',
                'libelle_en' => 'Apple'
            ],
            4 => [
                'libelle' => 'Abricot',
                'libelle_en' => 'Apricot'
            ],
            5 => [
                'libelle' => 'Poire',
                'libelle_en' => 'Pear'
            ],
            6 => [
                'libelle' => 'Pêche',
                'libelle_en' => 'Peach'
            ],
            7 => [
                'libelle' => 'Prune',
                'libelle_en' => 'Plum'
            ],
            8 => [
                'libelle' => 'Pastèque',
                'libelle_en' => 'Watermelon'
            ],
            9 => [
                'libelle' => 'Melon',
                'libelle_en' => 'Melon'
            ],
            10 => [
                'libelle' => 'Piment',
                'libelle_en' => 'Chilli peppers'
            ],
            11 => [
                'libelle' => 'Courgette',
                'libelle_en' => 'Courgette'
            ],
            12 => [
                'libelle' => 'Concombre',
                'libelle_en' => 'Cocumber'
            ],
            13 => [
                'libelle' => 'Cornichon',
                'libelle_en' => 'Pickle'
            ],
            14 => [
                'libelle' => 'Aubergine',
                'libelle_en' => 'Eggplant'
            ],
            15 => [
                'libelle' => 'Citrouille',
                'libelle_en' => 'Pumpkin'
            ],
            16=> [
                'libelle' => 'Tomate',
                'libelle_en' => 'Tomato'
            ],
            17 => [
                'libelle' => 'Orange',
                'libelle_en' => 'Orange'
            ],
            18 => [
                'libelle' => 'Citron',
                'libelle_en' => 'Lemon'
            ],
            19 => [
                'libelle' => 'Citron vert',
                'libelle_en' => 'Lime'
            ],
            20 => [
                'libelle' => 'Kumquat',
                'libelle_en' => 'Kumquat'
            ],
            21 => [
                'libelle' => 'Pamplemousse',
                'libelle_en' => 'Grapefruit'
            ],
            22 => [
                'libelle' => 'Mûre',
                'libelle_en' => 'Blackberry'
            ],
            23 => [
                'libelle' => 'Myrtille',
                'libelle_en' => 'Blueberry'
            ],
            24 => [
                'libelle' => 'Canneberge',
                'libelle_en' => 'Cranberry'
            ],
            25 => [
                'libelle' => 'Groseille',
                'libelle_en' => 'Gooseberry'
            ],
            26 => [
                'libelle' => 'Framboise',
                'libelle_en' => 'Raspeberry'
            ],
            27 => [
                'libelle' => 'Fraise',
                'libelle_en' => 'Strawberry'
            ],
            28 => [
                'libelle' => 'Cassis',
                'libelle_en' => 'Blackcurrant'
            ],
            29 => [
                'libelle' => 'Groseille rouge',
                'libelle_en' => 'Redcurrant'
            ],
            30 => [
                'libelle' => 'Kiwi',
                'libelle_en' => 'Kiwi'
            ],
            31 => [
                'libelle' => 'Papaye',
                'libelle_en' => 'Papaya'
            ],
            32 => [
                'libelle' => 'FRuit du dragon/Pitaya',
                'libelle_en' => 'Dragonfruit'
            ],
            33 => [
                'libelle' => 'Mangue',
                'libelle_en' => 'Mango'
            ],
            34 => [
                'libelle' => 'Ananas',
                'libelle_en' => 'Pineapple'
            ],
            35 => [
                'libelle' => 'Figue',
                'libelle_en' => 'Fig'
            ],
            36 => [
                'libelle' => 'Litchi',
                'libelle_en' => 'Lychee'
            ],
            37 => [
                'libelle' => 'Noix de coco',
                'libelle_en' => 'Coconut'
            ],
            38 => [
                'libelle' => 'Grenade',
                'libelle_en' => 'Pomegranate'
            ],
            39 => [
                'libelle' => 'Figue de barbarie',
                'libelle_en' => 'Prickly pear'
            ],
            40 => [
                'libelle' => 'Fruit de la passion',
                'libelle_en' => 'Passion fruit'
            ],


            ];

            foreach($vocabulaires as $key => $value){
                $vocabulaire = new Vocabulaire();
                //$vocabulaire->setCategorie($categorie);
                $vocabulaire->setLibelle($value['libelle']);
                $vocabulaire->setLibelleEn($value['libelle_en']);
                $manager->persist($vocabulaire);
            }
            
            $manager->flush(); 
    }
}
