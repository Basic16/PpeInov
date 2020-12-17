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

        $this->loadVocabulaires();
        $this->listCategories($manager);
        $this->listThemes($manager);
        $this->listAbonnements($manager);
        $this->listAdmin($manager);


        
    }

    public function listCategories(ObjectManager $manager){
        $categorie1 = new Categorie();
        $categorie1->setLibelle('Nom');
        $manager->persist($categorie1);

        $categorie2= new Categorie();
        $categorie2->setLibelle('Verbe');
        $manager->persist($categorie2);

        $categorie3= new Categorie();
        $categorie3->setLibelle('Adjectif');
        $manager->persist($categorie3);

        $categorie4= new Categorie();
        $categorie4->setLibelle('Adverbe');
        $manager->persist($categorie4);

        $categorie5= new Categorie();
        $categorie5->setLibelle('Pronom');
        $manager->persist($categorie5);

        $categorie6= new Categorie();
        $categorie6->setLibelle('Déterminant');
        $manager->persist($categorie6);



        $manager->flush();


    }


    public function listThemes(ObjectManager $manager){
        $theme1 = new Theme();
        $theme1->setLibelle('Fruits');
        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setLibelle('Animaux');
        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3->setLibelle('Corps');
        $manager->persist($theme3);

        $theme4 = new Theme();
        $theme4->setLibelle('Maison');
        $manager->persist($theme4);

        $theme5 = new Theme();
        $theme5->setLibelle('Sports');
        $manager->persist($theme5);

        $theme6 = new Theme();
        $theme6->setLibelle('Informatique');
        $manager->persist($theme6);

        $theme8 = new Theme();
        $theme8->setLibelle('Ecole');
        $manager->persist($theme8);

        $theme9 = new Theme();
        $theme9->setLibelle('Couleurs');
        $manager->persist($theme9);

        $theme10 = new Theme();
        $theme10->setLibelle('Nombres');
        $manager->persist($theme10);


        $manager->flush();


    }

    public function listAbonnements(ObjectManager $manager){
        $abonnement1 = new Abonnement();
        $abonnement1->setType('Annuel');
        $abonnement1->setPaiement('1');
        $abonnement1->setPrix('120.99');
        $manager->persist($abonnement1);


        $abonnement2 = new Abonnement();
        $abonnement2->setType('Mensuel');
        $abonnement2->setPaiement('1');
        $abonnement2->setPrix('9.99');
        $manager->persist($abonnement2);

        
        $abonnement3 = new Abonnement();
        $abonnement3->setType('Trimestriel');
        $abonnement3->setPaiement('1');
        $abonnement3->setPrix('25.99');
        $manager->persist($abonnement3);


        $manager->flush();
    }

    public function listAdmin(ObjectManager $manager){
        $admin = new User();
        $admin->setNom('ADMIN');
        $admin->setPrenom('admin');
        $admin->setEmail('admin@admin');
        $admin->setPassword('admin');
        $admin->setDatedenaissance(new \DateTime());
        $admin->setDateInscription(new \DateTime());
        $manager->persist($admin);
        

        $manager->flush();
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
