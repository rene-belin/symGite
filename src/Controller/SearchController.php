<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/search')]
class SearchController extends AbstractController
{
    #[Route('/', name: 'app_search_index', methods: ['GET'])]
    public function index(GiteRepository $giteRepository): Response
    {
        return $this->render('search/index.html.twig', [
            'gites' => $giteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_search_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gite);
            $entityManager->flush();

            return $this->redirectToRoute('app_search_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('search/new.html.twig', [
            'gite' => $gite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_search_show', methods: ['GET'])]
    public function show(Gite $gite): Response
    {
        return $this->render('search.html.twig', [
            'gite' => $gite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_search_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gite $gite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_search_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('search/edit.html.twig', [
            'gite' => $gite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_search_delete', methods: ['POST'])]
    public function delete(Request $request, Gite $gite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gite->getId(), $request->request->get('_token'))) {
            $entityManager->remove($gite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_search_index', [], Response::HTTP_SEE_OTHER);
    }
}
