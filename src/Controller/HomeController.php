<?php

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
    public function proprietaire(Request $request) {
        $proprietaire = new proprietaire();
        $form = $this->createForm(proprietaireType::class, $proprietaire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // Traitez les données du formulaire ici
        }
        return $this->render("home/proprietaire.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
