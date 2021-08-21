<?php

namespace App\Controller;

use DateTime;
use App\Repository\VenteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ResultatController extends AbstractController
{
    #[Route('/resultat/{user}', name: 'resultat')]
    public function index(VenteRepository $venteRepository, $user): Response
    {
        $utilisateur = $venteRepository->findByUser();
        // dd($utilisateur);

        $resultat = $venteRepository->findByUtilisateur($user);

        $total_periode1 = 0;
        $total_periode2 = 0;
        $total_periode3 = 0;

        $periode1 = new DateTime("2021-04-30");
        $periode2 = new DateTime("2021-08-31");
        $periode3 = new DateTime("2021-12-31");

        // triage des points de fidélité par date.
        foreach ($resultat as $key => $value){

            if($resultat[$key]->getDate() < ($periode1)){
                $total_periode1 = $total_periode1 + $resultat[$key]->getPoints();
            } elseif ($resultat[$key]->getDate() < ($periode2)){
                $total_periode2 = $total_periode2 + $resultat[$key]->getPoints();
            } else {
                $total_periode3 = $total_periode3 + $resultat[$key]->getPoints();
            }
        }
        
        // dump($total_periode2);
        return $this->render('resultat/index.html.twig', [
            'periode1' => $total_periode1,
            'periode2' => $total_periode2,
            'periode3' => $total_periode3,
            'liste_utilisateur' => $utilisateur,
            'user' => $user,
        ]);
    }
}
