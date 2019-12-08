<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $projet= new projet();
        $projet -> setNomProjet('this my first Hobbie'.rand(0,100));
        $projet -> setDescription('description'.rand(0,100));
        $projet -> setLienGitHub('loool'.rand(0,100));

        $manager->flush();
    }
}
