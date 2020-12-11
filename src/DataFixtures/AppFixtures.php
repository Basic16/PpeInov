<?php

namespace App\DataFixtures;

use App\Entity\Abonnement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Categorie;
use App\Entity\Vocabulaire;

class AppFixtures extends Fixture
{
    private $manager;
    private $faker;

    
    

        

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }


        
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
      
        $this->loadUsers();
        $this->loadCategories();
        $this->loadAbonnements();
        $this->loadVocabulaires();

        
    }

    public function loadUsers(){
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->setNom($this->faker->lastName())
            ->setPrenom($this->faker->firstName())
            ->setEmail($this->faker->email())
            ->setPassword(strtolower($user->getNom()))
            ->setdatedenaissance($this->faker->dateTimeThisCentury)
            ->setDateInscription($this->faker->dateTimeThisYear);
            $this->addReference('user'.$i, $user);
            $this->manager->persist($user);
        }
        $user = new User();
        $user->setNom('ADMIN')
        ->setPrenom('ADMIN')
        ->setEmail('admin@admin')
        ->setPassword('admin')
        ->setDateInscription(new \DateTime());
        $this->addReference('admin', $user);

        

        $this->manager->flush();

    }

    public function loadCategories(){
        for($i=0;$i<10;$i++){
            $categorie = new Categorie();
            $categorie->setLibelle($this->faker->word());
            $this->addReference('categorie'.$i, $categorie);
            $this->manager->persist($categorie);
        }
        $categorie = new Categorie();
        $categorie->setLibelle('Fruits');
        $this->addReference('fruits', $categorie);

        

        $this->manager->flush();

    }


    public function loadAbonnements(){
        for($i=0;$i<10;$i++){
            $abonnement = new Abonnement();
            $abonnement->setType($this->faker->word())
            ->setPaiement($this->faker->randomDigitNot(0))
            ->setPrix($this->faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 100))
            ;
            $this->addReference('abonnement'.$i, $abonnement);
            $this->manager->persist($abonnement);
        }
        $abonnement = new Abonnement();
        $abonnement->setType('Annuel');
        $abonnement->setPaiement('1');
        $abonnement->setPrix('120.99');
        $this->addReference('annuel', $abonnement);

        

        $this->manager->flush();

    }


    public function loadVocabulaires(){
        for($i=0;$i<10;$i++){
            $vocabulaire = new Vocabulaire();
            $vocabulaire->setLibelle($this->faker->word())
            ->setLibelleEn($this->faker->word())
            ;
            $this->addReference('libelle'.$i, $vocabulaire);
            $this->manager->persist($vocabulaire);
        }
        $vocabulaire = new Vocabulaire();
        $vocabulaire->setLibelle('Fraise');
        $vocabulaire->setLibelleEn('Strawberry');
        $this->addReference('fraise', $vocabulaire);

        

        $this->manager->flush();

    }


}
