<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    /**
     * @Route("/test1", name="test1")
     */
    public function test1(): Response
    {
        $nom = "KHEDHIRI";
        $prenom = "Lotfi";
        $notes = [12,1,15,18,20,9];
        return $this->render('test/test1.html.twig', ["nom" => $nom,"prenom" => $prenom,"notes" => $notes  ]);
    }
     /**
     * @Route("/test2/{prenom}/{nom}", name="test2")
     */
    public function test2($prenom,$nom): Response
    {
       
        $notes = [12,1,15,18,20,9];
        return $this->render('test/test2.html.twig', ["nom" => $nom,"prenom" => $prenom,"notes" => $notes  ]);
    }
}
