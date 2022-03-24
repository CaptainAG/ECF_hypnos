<?php

namespace App\DataFixtures;

use App\Entity\Hotel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HotelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //HOTEL1
        $hotel= new Hotel();
        $hotel ->setName('hypnos La Rochelle');
        $hotel ->setCity('La Rochelle');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL2
        $hotel= new Hotel();
        $hotel ->setName('hypnos Toulouse');
        $hotel ->setCity('Toulouse');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL3
        $hotel= new Hotel();
        $hotel ->setName('hypnos Canne');
        $hotel ->setCity('Canne');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL4
        $hotel= new Hotel();
        $hotel ->setName('hypnos Paris');
        $hotel ->setCity('Paris');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL5
        $hotel= new Hotel();
        $hotel ->setName('hypnos Rennes');
        $hotel ->setCity('Rennes');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL6
        $hotel= new Hotel();
        $hotel ->setName('hypnos Strasbourg');
        $hotel ->setCity('Strasbourg');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        //HOTEL7
        $hotel= new Hotel();
        $hotel ->setName('hypnos Lyon');
        $hotel ->setCity('Lyon');
        $hotel ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel);

        $manager->flush();
    }
}
