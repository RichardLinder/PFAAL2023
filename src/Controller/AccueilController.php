<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ImageClefRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    //page principal du site
// route de la page ;: comment accèdé a la page depuis l'url 
    #[Route('/accueil', name: 'app_accueil')]
    public function index( ArticleRepository $articleRepository,ImageClefRepository $imageClefRepository): Response

    {

        $photos = $imageClefRepository->findBy([], ["id" => "ASC"]);
        $articles = $articleRepository->findBy([], ["id" => "ASC"]);
        return $this->render('accueil/index.html.twig', [
            'articles' => $articles,
            'photos' => $photos

        ]);
    }


    #[Route('/404', name: 'app_quatreCentQuatre')]

    public function quatreCentQuatre() 
    {
        return $this->render('/accueil/404.html.twig');
    }



}
