<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carte = new Carte();
        $carte->setTitre('Les Entrées');
        $manager->persist($carte);

        $carte = new Carte();
        $carte->setTitre('Les Dégustations');
        $manager->persist($carte);

        $carte = new Carte();
        $carte->setTitre('Les Desserts');
        $manager->persist($carte);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
