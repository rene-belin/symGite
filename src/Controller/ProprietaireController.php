<?php

namespace App\Controller;

use App\Entity\Proprietaire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProprietaireController extends AbstractController
{
    #[Route('/proprietaire/add', name: 'app_proprietaire')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $proprietaire = new Proprietaire();
        $proprietaire->setNom('John');
        $proprietaire->setNom('Doe');


        return $this->render('proprietaire/index.html.twig', [
            'controller_name' => 'ProprietaireController',
        ]);
    }
}
