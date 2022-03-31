<?php

namespace App\DataFixtures;

use App\Entity\Gallerie;
use App\Entity\Hotel;
use App\Entity\User;
use App\Entity\Suite;
use App\Entity\Sujet;
use App\Entity\Demande;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;



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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel1)

                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));

                     

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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel2)
                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));
                     
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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel3)
                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));

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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel4)
                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));
                     

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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel5)
                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));
                     

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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel6)
                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));
                     

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
            $suite ->setTitle($faker->sentence($nbWords=2, $variableNbWords = true))
                    ->setDescription($faker->paragraph(2))
                    ->setPrice(50)
                    ->setIsReserved($faker->randomElement(['0','1']))
                    
                    ->setHotel($hotel7)

                    ->setImageName($faker->image('public/images/suite',500,400, 'suite',false));
                     

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

        for($i =1; $i <= 5; $i++){
            
            $user= new User();
            $user ->setEmail($faker->email);
            $user ->setRoles(['ROLE_USER']);
            $user ->setPassword('$2y$10$Htv/9eNxF6Rk8leKDFYcHO28oCi5wRFnies8sGwut0fPAvJc05Ph.');
            $user ->setName($faker->lastname());
            $user ->setFirstname($faker->firstName());
            $user ->setIsVerified('1');
    
    
            $manager->persist($user);
        }

        


        //Sujet
        $sujet1= new Sujet();
        $sujet1->setDescription('Je souhaite poser une réclamation');

        $manager->persist($sujet1);

        $sujet2= new Sujet();
        $sujet2->setDescription('Je souhaite commander un service supplémentaire');

        $manager->persist($sujet2);

        $sujet3= new Sujet();
        $sujet3->setDescription('Je souhaite en savoir plus sur une suite');

        $manager->persist($sujet3);

        $sujet4= new Sujet();
        $sujet4->setDescription('J’ai un souci avec cette application');

        $manager->persist($sujet4);


        //Demande 
        for($i =1; $i <= 5; $i++){
            
            $demande = new Demande();
            $demande ->setName($faker->lastname())
            ->setFirstname($faker->firstName())
                    ->setEmail($faker->email)
                    ->setSujet($sujet1)
                    ->setCreatedAt($faker->dateTimeBetween('-10 week', '-1 week'))
                    ->setProcessed($faker->randomElement(['0','1']))
                    ->setMessage($faker->paragraph());
                     

            $manager->persist($demande);
                     
        }

        for($i =1; $i <= 5; $i++){
            
            $demande = new Demande();
            $demande ->setName($faker->lastname())
                    ->setFirstname($faker->firstName())
                    ->setEmail($faker->email)
                    ->setSujet($sujet2)
                    ->setCreatedAt($faker->dateTimeBetween('-10 week', '-1 week'))
                    ->setProcessed($faker->randomElement(['0','1']))
                    ->setMessage($faker->paragraph());
                     

            $manager->persist($demande);
                     
        }

        for($i =1; $i <= 5; $i++){
            
            $demande = new Demande();
            $demande ->setName($faker->lastname())
                    ->setFirstname($faker->firstName())
                    ->setEmail($faker->email)
                    ->setSujet($sujet3)
                    ->setCreatedAt($faker->dateTimeBetween('-10 week', '-1 week'))
                    ->setProcessed($faker->randomElement(['0','1']))
                    ->setMessage($faker->paragraph());
                     

            $manager->persist($demande);
                     
        }

        for($i =1; $i <= 5; $i++){
            
            $demande = new Demande();
            $demande ->setName($faker->lastname())
                    ->setFirstname($faker->firstName())
                    ->setEmail($faker->email)
                    ->setSujet($sujet4)
                    ->setCreatedAt($faker->dateTimeBetween('-10 week', '-1 week'))
                    ->setProcessed($faker->randomElement(['0','1']))
                    ->setMessage($faker->paragraph());
                     

            $manager->persist($demande);
                     
        }

       




        $manager->flush();
    }
}
