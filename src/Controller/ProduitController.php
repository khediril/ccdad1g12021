<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/add", name="produit_add")
     */
    public function add(): Response
    {
        $c = new Categorie();
        $c->setNom("categ1");
        $produit = new Produit();
        $produit->setNom("tomate");
        $produit->setPrix(1500);
        $produit->setDescription("bonne Tomate");
        $produit->setCategorie($c);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($c); 
        $entityManager->persist($produit);
        
        $entityManager->flush();
        
        
        return $this->render('produit/add.html.twig', ["produit"=>$produit
            
        ]);
    }
    /**
     * @Route("/produit/list", name="produit_list")
     */
    public function list(): Response
    {
        
         $produits = $this->getDoctrine()
                          ->getRepository(Produit::class)
                          ->findAll();

        
        
        
        return $this->render('produit/list.html.twig', ["produits"=>$produits
            
        ]);
    }
}
