<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Suite;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\Tests_PHP81\Persistence\Reflection\Suit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route('/reservation')
 */
class ReservationController extends AbstractController
{
    /**
    * @Route('/reservation', name="app_reservation_index", methods={"GET"})
    */
    public function index(ReservationRepository $reservationRepository,Request $request): Response
    {
        
        $id=$this->getUser();

        $limit=8;

        $page=(int)$request->query->get("page", 1);

        $reservation = $reservationRepository->getPaginatedReservations($page,$limit,$id);

        $total = $reservationRepository->getTotalReservations($id);


        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservation,
            'total'=> $total,
            'limit' => $limit,
            'page' => $page,
        ]);
    }

    #[Route('/verif', name: 'app_reservation_verif', methods: ['GET', 'POST'])]
    public function verif(ReservationRepository $reservationRepository): Response
    {
       
        
        if(!empty($_POST['suite']) && !empty($_POST['startDate']) && !empty($_POST['endDate']) ){
           
            $suite= $_POST['suite'] ;
            $startDate= $_POST['startDate'];
            $endDate= $_POST['endDate'];
            
            
            
            $result= $reservationRepository->disponible($suite,$startDate,$endDate);

            $r=count($result);

            if($r < 1 ){
                
                return $this->json([
                    'code' =>200,
                    'status' => 'success',
                    'message' => 'Suite disponible'
                ],200);
                
            }else{
                return $this->json([
                    'code' =>200,
                    'status' => 'error',
                    'message' => 'Suite indisponible'
                ],200);
            
            }
        }else{
            return $this->json([
                'code' =>200,
                'message' => 'Veillez remplir les champs '
            ],200);
        }


        
    }

    #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReservationRepository $reservationRepository,): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        $id= $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            
            $reservation->setUser($id);
            $reservationRepository->add($reservation);
            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/new', name: 'app_reservation_new_r', methods: ['GET', 'POST'])]
    public function newR(Request $request, ReservationRepository $reservationRepository,$id,Suite $suite): Response
    {
        
        $user= $this->getUser();
        

        $suite->getId($id);
        $hotel= $suite->getHotel();
        $result=$reservationRepository->findByHotelId($hotel);

        $r=count($result);

        if($r < 1 ){
            $reservation = new Reservation();
            $reservation->setHotel($hotel);
            $reservation->setSuite($suite);
            $form = $this->createForm(ReservationType::class, $reservation);
            $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                
                    $reservation->setUser($user);
                    $reservationRepository->add($reservation);
                    return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
                }
        
                return $this->renderForm('reservation/new.html.twig', [
                    'reservation' => $reservation,
                    'form' => $form,
                ]);
        }else{
            return $this->redirectToRoute('app_reservation_new', [], Response::HTTP_SEE_OTHER);
        }
        
    }



    #[Route('/{id}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, ReservationRepository $reservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $reservationRepository->remove($reservation);
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
    
    
}
