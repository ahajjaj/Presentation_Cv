<?php

namespace App\DataFixtures;


use App\Entity\Hobbie;
use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        {
            for($i=0; $i<3; $i++){
    
                $hobbie = new Hobbie();

                $hobbie -> setHobbie('Football'.rand(0,100));
            
                $manager->persist($hobbie);
            }
        }
        {
            for($i=0; $i<2; $i++){
    
                $projet= new Projet();
    
                $projet -> setNomProjet('this my first Hobbie'.rand(0,100));
                $projet -> setDescription('description'.rand(0,100));
                $projet -> setLienGitHub('loool'.rand(0,100));
    
                $manager->persist($projet);
            }
        }

        $manager->flush();
    }
}