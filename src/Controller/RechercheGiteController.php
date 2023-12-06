<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheGiteController extends AbstractController
{
    #[Route('/recherche/gite', name: 'app_recherche_gite')]
    public function index(): Response
    {
        return $this->render('recherche_gite/index.html.twig', [
            'controller_name' => 'RechercheGiteController',
        ]);
    }
}
