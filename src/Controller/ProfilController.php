<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {

        $this->denyAccessUnlessGranted('ROLE_USER');



        $profil = "jean";

        // a faire : afficher les info utilisateur 
        return $this->render('profil/index.html.twig', [
            'profil' => $profil,
        ]);
    }

// a faire function reset mot de passe




    
}
