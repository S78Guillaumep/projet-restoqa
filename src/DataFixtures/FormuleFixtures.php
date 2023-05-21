<?php

namespace App\DataFixtures;

use App\Entity\Formule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $formule = new Formule();
        $formule->setTitre('Formule Déjeuner');
        $formule->setDescription('Entrée+Dégustation+Dessert');
        $formule->setPrix(' 23 euros');
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule dîner');
        $formule->setDescription('Entrée+Dégustation+Dessert');
        $formule->setPrix(' 27 euros');
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule Enfant');
        $formule->setDescription('Entrée+Dégustation+Dessert+Boisson (-12ans)');
        $formule->setPrix(' 20 euros');
        $manager->persist($formule);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
