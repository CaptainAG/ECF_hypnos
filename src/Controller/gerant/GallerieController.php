<?php

namespace App\Controller\gerant;

use App\Entity\Gallerie;
use App\Form\GallerieType;
use App\Repository\GallerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gerant/gallerie')]
class GallerieController extends AbstractController
{
   
    #[Route('/new', name: 'app_gerant_gallerie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GallerieRepository $gallerieRepository): Response
    {
        $gallerie = new Gallerie();
        $form = $this->createForm(GallerieType::class, $gallerie,array('hotel'=>$this->getUser()->getHotel()->getId()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gallerieRepository->add($gallerie);
            return $this->redirectToRoute('app_gerant_suite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gallerie/new.html.twig', [
            'gallerie' => $gallerie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gerant_gallerie_index', methods: ['GET'])]
    public function index(GallerieRepository $gallerieRepository,$id): Response
    {
        return $this->render('gallerie/index.html.twig', [
            'galleries' => $gallerieRepository->findBySuiteID($id),
        ]);
    }
    

    #[Route('/{id}', name: 'app_gerant_gallerie_delete', methods: ['POST'])]
    public function delete(Request $request, Gallerie $gallerie, GallerieRepository $gallerieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gallerie->getId(), $request->request->get('_token'))) {
            $gallerieRepository->remove($gallerie);
        }

        return $this->redirectToRoute('app_gerant_suite_index', [], Response::HTTP_SEE_OTHER);
    }
}
