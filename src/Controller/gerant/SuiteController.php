<?php

namespace App\Controller\gerant;

use App\Entity\Hotel;
use App\Entity\Suite;
use App\Form\SuiteType;
use App\Repository\SuiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gerant/suite')]
class SuiteController extends AbstractController
{
    #[Route('/', name: 'app_gerant_suite_index', methods: ['GET'])]
    public function index(SuiteRepository $suiteRepository,Request $request): Response
    {
        $id=$this->getUser()->getHotel()->getId();
        
        $limit=4;
    
        $page=(int)$request->query->get("page", 1);

        $suite= $suiteRepository->getPaginatedSuites($page,$limit,$id);

        $total= $suiteRepository->getTotalSuites($id);

        return $this->render('suite/index.html.twig', [
            'suites' => $suite,
            'total'=> $total,
            'limit' => $limit,
            'page' => $page,
        ]);
    }

    #[Route('/new', name: 'app_gerant_suite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SuiteRepository $suiteRepository): Response
    {
        $suite = new Suite();
        $form = $this->createForm(SuiteType::class, $suite);
        $form->handleRequest($request);

        $id= $this->getUser()->getHotel();

        if ($form->isSubmitted() && $form->isValid()) {
            $suite->setHotel($id);
            
            $suiteRepository->add($suite);
            return $this->redirectToRoute('app_gerant_suite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suite/new.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gerant_suite_show', methods: ['GET'])]
    public function show(Suite $suite): Response
    {
        
        return $this->render('suite/show.html.twig', [
            'suite' => $suite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gerant_suite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Suite $suite, SuiteRepository $suiteRepository): Response
    {
        $form = $this->createForm(SuiteType::class, $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $suiteRepository->add($suite);
            return $this->redirectToRoute('app_suite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suite/edit.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gerant_suite_delete', methods: ['POST'])]
    public function delete(Request $request, Suite $suite, SuiteRepository $suiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suite->getId(), $request->request->get('_token'))) {
            $suiteRepository->remove($suite);
        }

        return $this->redirectToRoute('app_gerant_suite_index', [], Response::HTTP_SEE_OTHER);
    }
}
