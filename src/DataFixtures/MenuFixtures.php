<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $menu = new Menu();
        $menu->setTitre('Menu du Marché');
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitre('Menu Découverte');
        $manager->persist($menu);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
