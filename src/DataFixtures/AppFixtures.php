<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;




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
        

        $this->manager->flush();

    }

}
