<?php

namespace App\DataFixtures;

use App\Entity\Hobbie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HobbieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $hobbie= new Hobbie();
        $hobbie -> setHobbie('this my first Hobbie'.rand(0,100));
        
        $manager->flush();
    }
}
