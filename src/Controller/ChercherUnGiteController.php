<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChercherUnGiteController extends AbstractController
{
    #[Route('/chercher/un/gite', name: 'app_chercher_un_gite')]
    public function index(): Response
    {
        return $this->render('chercher_un_gite/index.html.twig', [
            'controller_name' => 'ChercherUnGiteController',
        ]);
    }
}
