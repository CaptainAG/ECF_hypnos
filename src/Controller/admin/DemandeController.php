<?php

namespace App\Controller\admin;

use App\Entity\Demande;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/demande")
 */
class DemandeController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_demande", methods={"GET"})
     */
    public function index(DemandeRepository $demandeRepository, Request $request): Response
    {
        $limit = 8;

        $page = (int)$request->query->get("page", 1);

        $demande = $demandeRepository->getPaginatedDemandes($page, $limit);

        $total = $demandeRepository->getTotalDemandes();

        return $this->render('demande/index.html.twig', [
            'demandes' => $demande,
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
        ]);
    }


    /**
     * @Route("/{id}", name="app_admin_demande_show", methods={"GET"})
     */
    public function show(Demande $demande): Response
    {
        return $this->render('demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_demande_edit", methods= {"GET", "POST"})
     */
    public function edit(Request $request, Demande $demande, DemandeRepository $demandeRepository): Response
    {
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandeRepository->add($demande);

            return $this->redirectToRoute('app_admin_demande_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_demande_delete", methods= {"POST"})
     */
    public function delete(Request $request, Demande $demande, DemandeRepository $demandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $demande->getId(), $request->request->get('_token'))) {
            $demandeRepository->remove($demande);
        }

        return $this->redirectToRoute('app_admin_demande_new', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/processed/{id}", name="app_admin_demande_traite", methods={"GET"})
     */
    public function activer(Demande $demande, EntityManagerInterface $entityManager): Response
    {
        $demande->setProcessed(($demande->getProcessed()) ? false : true);

        $entityManager->persist($demande);
        $entityManager->flush();

        return new Response("true");
    }

}
