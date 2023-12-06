<?php
// HomeController.php

namespace App\Controller;

use App\Entity\Proprietaire;
use App\Form\ProprietaireType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {
    #[Route('/home', name: 'app_home')]
    public function index(): Response {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/proprietaire', name: 'home_proprietaire')]
    public function proprietaire(Request $request): Response {
        $proprietaire = new Proprietaire();
        $form = $this->createForm(ProprietaireType::class, $proprietaire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proprietaire);
            $entityManager->flush();

            $this->addFlash('success', 'Le formulaire a été soumis avec succès.');
            return $this->redirectToRoute('app_home'); // Redirection vers la page d'accueil
        }

        return $this->render("home/proprietaire.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
