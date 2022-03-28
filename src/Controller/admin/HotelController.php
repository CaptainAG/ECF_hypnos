<?php

namespace App\Controller\admin;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/hotel')]
class HotelController extends AbstractController
{
    #[Route('/', name: 'app_admin_hotel', methods: ['GET'])]
    public function index(HotelRepository $hotelRepository, Request $request): Response
    {
        $limit=4;
    
        $page=(int)$request->query->get("page", 1);

        $hotel= $hotelRepository->getPaginatedHotels($page,$limit);

        $total= $hotelRepository->getTotalHotels();
      

        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotel,
            'total'=> $total,
            'limit' => $limit,
            'page' => $page,
        ]);
    }

    #[Route('/new', name: 'app_admin_hotel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HotelRepository $hotelRepository): Response
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hotelRepository->add($hotel);
            return $this->redirectToRoute('app_admin_hotel', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hotel/new.html.twig', [
            'hotel' => $hotel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_hotel_show', methods: ['GET'])]
    public function show(Hotel $hotel, SuiteRepository $suiteRepository): Response
    {
        

        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
            
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_hotel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hotel $hotel, HotelRepository $hotelRepository): Response
    {
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hotelRepository->add($hotel);
            return $this->redirectToRoute('app_admin_hotel', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hotel/edit.html.twig', [
            'hotel' => $hotel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_hotel_delete', methods: ['POST'])]
    public function delete(Request $request, Hotel $hotel, HotelRepository $hotelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hotel->getId(), $request->request->get('_token'))) {
            $hotelRepository->remove($hotel);
        }

        return $this->redirectToRoute('app_admin_hotel', [], Response::HTTP_SEE_OTHER);
    }
}
