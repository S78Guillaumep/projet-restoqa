<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Faker;

class UtilisateurFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncodeur
    ){}


    public function load(ObjectManager $manager): void
    {
        $admin = new Utilisateur();
        $admin->setEmail('admin@restoqa.fr');
        $admin->setNom('Vauban');
        $admin->setPrenom('Guillaume');
        $admin->setPassword(
            $this->passwordEncodeur->hashPassword($admin,'adminqa')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);


        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <=5; $usr++){
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail($faker->email);
            $utilisateur->setNom($faker->lastName);
            $utilisateur->setPrenom($faker->firstName());
            $utilisateur->setPassword(
                $this->passwordEncodeur->hashPassword($utilisateur,'secret')
            );
            
    
            $manager->persist($utilisateur);
       
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
