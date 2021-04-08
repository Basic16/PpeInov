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
use App\Entity\Test;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AppFixtures extends Fixture
{
    private $manager;
    private $faker;
 

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->faker=Factory::create("fr_FR");
        $this->encoder = $encoder;
    }


        
    
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
      
        $this->loadUsers();
        $this->listAdmin($manager);
        
    }

    public function listAdmin(ObjectManager $manager){
        $admin = new User();
        $password = $this->encoder->encodePassword($admin, "admin");
        $admin->setNom('ADMIN');
        $admin->setPrenom('admin');
        $admin->setEmail('admin@admin');
        $admin->setPassword($password);
        $admin->setRoles(array('ROLE_USER'));
        $admin->setDatedenaissance(new \DateTime());
        $admin->setDateInscription(new \DateTime());
        $manager->persist($admin);
        

        $manager->flush();
    }

    public function listTest(ObjectManager $manager){
        $test = new Test();
        
        $test->setLibelle('Test');
        $test->setNiveau('1');
        $test->setEmail('admin@admin');
        $test->setPassword($password);
       
        $manager->persist($test);
        

        $manager->flush();
    }


    public function loadUsers(){
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->setNom($this->faker->lastName())
            ->setPrenom($this->faker->firstName())
            ->setEmail($this->faker->email())
            ->setPassword(strtolower($user->getNom()))
            ->setRoles(array('ROLE_USER'))
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


}
