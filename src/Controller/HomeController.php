<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/hotel', name: 'app_hotel')]
    public function hotel(HotelRepository $hotelRepository): Response
    {
        $hotels=$hotelRepository->findAll();

        return $this->render('home/hotel.html.twig', [
            'controller_name' => 'HomeController',
            'hotels' => $hotels,
        ]);
    }

    #[Route('/hotel/{id}', name: 'hotel_show', methods: ['GET'])]
    public function show(Hotel $hotel, SuiteRepository $suiteRepository): Response
    {
       $id =  $hotel->getId();
       
        $suite= $suiteRepository->findByHotelID($id);

       
        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
            'suites' => $suite,
        ]);
    }
    
}
