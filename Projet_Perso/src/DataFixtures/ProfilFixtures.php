<?php

namespace App\DataFixtures;


use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
        $profils = ["APPRENANT", "ADMIN", "FORMATEUR", "CM"];
        for($i=0;$i<4;$i++) {
            $profil = new Profil();
            $profil->setLibelle($profils[$i]);
          
            $this->addReference($i,$profil);
            // $manager->flush();
            $manager->persist($profil);  
              
        }
       
        $manager->flush();
    }
}