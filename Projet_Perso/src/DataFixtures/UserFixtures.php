<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
// use faker\Factory;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

       
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setNom($faker->lastname);
            $user->setPrenom($faker->firstname);
            $password = $this->encoder->encodePassword($user, 'princessDev');
            $user->setPassword($password);
            
            // $product = new Product();
            $manager->persist($user);
            
            
        }

        $manager->flush();
    }
}