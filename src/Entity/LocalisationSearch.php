<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
// use App\Form\LocalisationSearchType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Localisation;

class LocalisationSearch
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Localisation")
     * 
     * 
     */
    private function localisationParCritere(Request $request)
    {
        $localisationSearch = new LocalisationSearch();
        $form = $this->createForm(LocalisationSearch::class, $localisationSearch);
        $form->handleRequest($request);

        $localisation = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $localisation = $localisationSearch->getLocalisation();
            if ($localisation != "")
                $localisations = $localisation->getLocalisation();
            else
                $localisations = $this->EntityManager()->getRepository(localisation::class)->findAll();
        }
        return $this->render('form/localisationType.html.twig', [
            'form' => $form->createView(),
            'localisation' => $localisation
        ]);
    }
}
