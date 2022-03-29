<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Entity\Suite;
use App\Entity\Demande;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/suite/{id}', name: 'app_suite_show', methods: ['GET'])]
    public function showSuite(Suite $suite): Response
    {
        return $this->render('suite/show.html.twig', [
            'suite' => $suite,
        ]);
    }

    #[Route('/contact', name: 'app_demande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandeRepository $demandeRepository): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

       


        if ($form->isSubmitted() && $form->isValid()) {
            $demande->setCreatedAt(new \DateTime());
            $demande->setProcessed('0');
            $demandeRepository->add($demande);
            
            $this->addFlash('message', 'Votre demande a bien été envoyé');

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }
    
}
