<?php

namespace App\DataFixtures;

use App\Entity\Gallerie;
use App\Entity\Hotel;
use App\Entity\User;
use App\Entity\Suite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Service\UploaderHelper;


class DataFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        
      
        //HOTEL1
        $hotel1= new Hotel();
        $hotel1 ->setName('hypnos La Rochelle');
        $hotel1 ->setCity('La Rochelle');
        $hotel1 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel1 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        
        

        $manager->persist($hotel1);

        //Création des suites hotel 1 
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel1)

                    ->setImageName($faker->imageUrl(500,400, 'suite'));

                     

            $manager->persist($suite);
        }

        

        //HOTEL2
        $hotel2= new Hotel();
        $hotel2 ->setName('hypnos Toulouse');
        $hotel2 ->setCity('Toulouse');
        $hotel2 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel2 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel2);

        //Création des suites hotel 2
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel2)
                    ->setImageName($faker->imageUrl(500,400, 'suite'));
                     
            $manager->persist($suite);
        }

        //HOTEL3
        $hotel3= new Hotel();
        $hotel3 ->setName('hypnos Canne');
        $hotel3 ->setCity('Canne');
        $hotel3 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel3 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel3);

        //Création des suites hotel 3
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel3)
                    ->setImageName($faker->imageUrl(500,400, 'suite'));

            $manager->persist($suite);
                     
        }

        //HOTEL4
        $hotel4= new Hotel();
        $hotel4 ->setName('hypnos Paris');
        $hotel4 ->setCity('Paris');
        $hotel4 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel4 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');

        $manager->persist($hotel4);

        //Création des suites hotel 4
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel4)
                    ->setImageName($faker->imageUrl(500,400, 'suite'));
                     

            $manager->persist($suite);
                     
        }
        

       

        //HOTEL5
        $hotel5= new Hotel();
        $hotel5 ->setName('hypnos Rennes');
        $hotel5 ->setCity('Rennes');
        $hotel5 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel5 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel5);

        //Création des suites hotel 5
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel5)
                    ->setImageName($faker->imageUrl(500,400, 'suite'));
                     

            $manager->persist($suite);
                     

            
        }

        //HOTEL6
        $hotel6= new Hotel();
        $hotel6 ->setName('hypnos Strasbourg');
        $hotel6 ->setCity('Strasbourg');
        $hotel6 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel6 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel6);

        //Création des suites hotel 6
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel6)
                    ->setImageName($faker->imageUrl(500,400, 'suite'));
                     

            $manager->persist($suite);
                     

            
        }

        //HOTEL7
        $hotel7= new Hotel();
        $hotel7 ->setName('hypnos Lyon');
        $hotel7 ->setCity('Lyon');
        $hotel7 ->setAdress('Place de l\'Hôtel-de-Ville');
        $hotel7 ->setDescription('Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.');
        

        $manager->persist($hotel7);

        //Création des suites hotel 7
        for($i =1; $i <= 5; $i++){
            
            $suite = new Suite();
            $suite ->setTitle($faker->sentence())
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel7)

                    ->setImageName($faker->imageUrl(500,400, 'suite'));
                     

            $manager->persist($suite);
        }

        
        
         //Création de la galerie photo 
         for($i =1; $i <= 35; $i++){
            $galerie = new Gallerie();
            $galerie ->setImage($faker->imageURL(360, 360, 'suite'))
                    ->setSuite($faker->randomElement([$suite]));
                    
                    
                    

            $manager->persist($galerie);
        }

        //ADMIN
        $user= new User();
        $user ->setEmail('john@admin.fr');
        $user ->setRoles(['ROLE_ADMIN']);
        $user ->setPassword('$2y$10$OQ2Hd9SgQCSI31SKy60p..3hUj5Xky.D33Vsf6LW2L2EnbwKUDNZ2');
        $user ->setName('Doe');
        $user ->setFirstname('John');
        $user ->setIsVerified('1');
        

        $manager->persist($user);

        //GERANT  1
        $user= new User();
        $user ->setEmail('david@hypnos.fr');
        $user ->setRoles(['ROLE_GERANT']);
        $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
        $user ->setName('A');
        $user ->setFirstname('David');
        $user ->setIsVerified('1');
        $user->setHotel($hotel1);
        

        $manager->persist($user);

         //GERANT  2
         $user= new User();
         $user ->setEmail('lucas@hypnos.fr');
         $user ->setRoles(['ROLE_GERANT']);
         $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
         $user ->setName('B');
         $user ->setFirstname('Lucas');
         $user ->setIsVerified('1');
         $user->setHotel($hotel2);
         
 
         $manager->persist($user);

         //GERANT  3
         $user= new User();
         $user ->setEmail('noemi@hypnos.fr');
         $user ->setRoles(['ROLE_GERANT']);
         $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
         $user ->setName('C');
         $user ->setFirstname('Noemi');
         $user ->setIsVerified('1');
         $user->setHotel($hotel3);
         
 
         $manager->persist($user);

         //GERANT  4
         $user= new User();
         $user ->setEmail('maxine@hypnos.fr');
         $user ->setRoles(['ROLE_GERANT']);
         $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
         $user ->setName('D');
         $user ->setFirstname('Maxine');
         $user ->setIsVerified('1');
         $user->setHotel($hotel4);

          //GERANT  5
          $user= new User();
          $user ->setEmail('alexandre@hypnos.fr');
          $user ->setRoles(['ROLE_GERANT']);
          $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
          $user ->setName('E');
          $user ->setFirstname('Alexandre');
          $user ->setIsVerified('1');
          $user->setHotel($hotel5);
         
 
         $manager->persist($user);

          //GERANT  6
          $user= new User();
          $user ->setEmail('lea@hypnos.fr');
          $user ->setRoles(['ROLE_GERANT']);
          $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
          $user ->setName('F');
          $user ->setFirstname('Lea');
          $user ->setIsVerified('1');
          $user->setHotel($hotel6);
         
 
         $manager->persist($user);

         //GERANT  7
         $user= new User();
         $user ->setEmail('pierre@hypnos.fr');
         $user ->setRoles(['ROLE_GERANT']);
         $user ->setPassword('$2y$10$wX0/Pn1pYs0HmoJyh1HN7OX0.YqpV9yPhVusPq057l/6ckSNwZj/O');
         $user ->setName('G');
         $user ->setFirstname('Pierre');
         $user ->setIsVerified('1');
         $user->setHotel($hotel7);
        

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
