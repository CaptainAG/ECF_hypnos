<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //ADMIN
        $user= new User();
        $user ->setEmail('john@admin.fr');
        $user ->setRoles(['ROLE_ADMIN']);
        $user ->setPassword('$2y$10$OQ2Hd9SgQCSI31SKy60p..3hUj5Xky.D33Vsf6LW2L2EnbwKUDNZ2');
        $user ->setName('Doe');
        $user ->setFirstname('John');
        $user ->setIsVerified('1');

        $manager->persist($user);

        //GERANT  
        $user= new User();
        $user ->setEmail('david@hypnoslarochelle.fr');
        $user ->setRoles(['ROLE_GERANT']);
        $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
        $user ->setName('H');
        $user ->setFirstname('david');
        $user ->setIsVerified('1');
        

        $manager->persist($user);

        //USER
        $user= new User();
        $user ->setEmail('elodie@test.fr');
        $user ->setRoles(['ROLE_USER']);
        $user ->setPassword('$2y$10$Htv/9eNxF6Rk8leKDFYcHO28oCi5wRFnies8sGwut0fPAvJc05Ph.');
        $user ->setName('J');
        $user ->setFirstname('elodie');
        $user ->setIsVerified('1');


        $manager->persist($user);

        $manager->flush();
    }
}
