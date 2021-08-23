<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Form\FidetliteType;
use Doctrine\ORM\EntityManager;
use App\Repository\VenteRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FideliteController extends AbstractController
{
    #[Route('/', name: 'fidelite')]
    public function index(VenteRepository $venteRepository): Response
    {
        $vente = $venteRepository->findAll();
        // dd($vente);
        return $this->render('fidelite/index.html.twig', [
            'vente' => $vente,
        ]);
    }


    #[Route('/vente', name: 'vente')]
    public function ajouter_vente(Request $request, EntityManagerInterface $em,)
    {
        $nouvelle_vente = new Vente();
        $formVente = $this->createForm(FidetliteType::class, $nouvelle_vente);
        
        $formVente->handleRequest($request);
        
        if($formVente->isSubmitted() && $formVente->isValid()){
            
            $p1 = $formVente->get("Produit1")->getData();
            $p2 = $formVente->get("Produit2")->getData();
            $p3 = $formVente->get("Produit3")->getData();
            $p4 = $formVente->get("Produit4")->getData();

            // calcul points produit 1
            $points_p1 = ($p1 * 5);
            
            // calcul points produit 2
            // Effectivement je n'ai pas fait attention à l'énoncé "si au moins 1 "PRODUIT 1" est vendu
            if($p1>=1){$points_p2 = ($p2 * 5);}
            else {$points_p2 = 0;}
            
            // calcul points produit 3
            if($p3>=2){$points_p3 = ((floor($p3 / 2))* 15);}
            else{$points_p3 = 0;}

            // calcul points produit 4 
            $points_p4 = ($p4 * 35);
            
            // $total = $points_p1+$points_p2+$points_p3+$points_p4;
            $nouvelle_vente->setPoints($points_p1+$points_p2+$points_p3+$points_p4);
            // dd($points_p4);
            // dd($points_p1, $points_p2, $points_p3, $points_p4, $total);



            $em->persist($nouvelle_vente);
            $em->flush();

            
            return $this->redirectToRoute("fidelite");
        }
        
        // dd($nouvelle_vente);
        return $this->render('fidelite/formVente.html.twig', 
        ["formVente" => $formVente->createView(),]
    );
    }
}
