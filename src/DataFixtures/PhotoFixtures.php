<?php

namespace App\DataFixtures;

use App\Entity\Galerie;
use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class PhotoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        for($img = 1; $img <= 15; $img++){
            $photo = new Photo();
            $photo->setTitre($faker->image(null, 640, 480));
            $photo->setDescription($faker->text());
            $manager->persist($photo);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
