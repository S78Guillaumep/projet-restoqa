<?php

namespace App\DataFixtures;

use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $plat = new Plat();
        $plat->setTitreplat('Planche de charcuterie');
        $plat->setType('Entrée');
        $plat->setDescription('Assortiment de charcuterie Coppa, jambon de Savoie, rosette de Lyon');
        $plat->setPrix('11 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Croustillants de table');
        $plat->setType('Entrée');
        $plat->setDescription('Pâte dilo, Reblochon et son filet de miel');
        $plat->setPrix('11 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Brouillade à la truffe');
        $plat->setType('Entrée');
        $plat->setDescription('Oeuf,beurre,crème et truffe fraîche');
        $plat->setPrix('11 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Burger Signature');
        $plat->setType('Dégustation');
        $plat->setDescription('Steak haché de boeuf, raclette, reblochon lait cru AOP, salade, tomate, oignons confits');
        $plat->setPrix(' 17 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Tartiflette');
        $plat->setType('Dégustation');
        $plat->setDescription('A composer: lardons fumés ou poulet ou saucisse');
        $plat->setPrix(' 18 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Fondue savoyarde traditionnelle');
        $plat->setType('Dégustation');
        $plat->setDescription('aux quatre fromages: vin blanc, emmental label label rouge, comté AOP');
        $plat->setPrix(' 18 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Crêpes Gourmmandes');
        $plat->setType('Dessert');
        $plat->setDescription('Au choix: Flambée, salidou, iceberg, normande');
        $plat->setPrix(' 7 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Crêpes au Froment');
        $plat->setType('Dessert');
        $plat->setDescription('Au choix: beurre et cassonnade, miel, nutella, chocolat');
        $plat->setPrix(' 5 euros');
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitreplat('Crêpes à la Confiture');
        $plat->setType('Dessert');
        $plat->setDescription('Au choix: Fraise, framboise, myrtille, figue');
        $plat->setPrix(' 5 euros');
        $manager->persist($plat);
         
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
