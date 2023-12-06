<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Gite;
class GiteController extends AbstractController
{
    #[Route('/gite', name: 'app_gite')]
    public function index(): Response
    {
        $gite=$this->getDoctrine()->getRepository(Gites::class)->findAll();

        dd($gite);

        return $this->render('gite/index.html.twig', [
            'controller_name' => 'GiteController',
        ]);
    }
}
