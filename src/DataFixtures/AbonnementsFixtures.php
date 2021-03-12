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

class AbonnementsFixtures extends Fixture
{
    private $manager;
    private $faker;


    public function __construct(){
        $this->faker=Factory::create("fr_FR");
        
    }


        
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
      
        
        
        
        $abonnements = [
            1 => [
                'type' => 'Annuel',
                'paiement' => '1',
                'prix' => '120.99'
            ],
            2 => [
                'type' => 'Mensuel',
                'paiement' => '1',
                'prix' => '12.99'
            ],
            3 => [
                'type' => 'Trimestriel',
                'paiement' => '1',
                'prix' => '34.90'
            ],
            4 => [
                'type' => 'Annuel',
                'paiement' => '6',
                'prix' => '140.99'
            ],
            ];

            foreach($abonnements as $key => $value){
                $abonnement = new Abonnement();
                $abonnement->setType($value['type']);
                $abonnement->setPaiement($value['paiement']);
                $abonnement->setPrix($value['prix']);
                $manager->persist($abonnement);

                
                
            }

            $manager->flush();
        
    }



}
