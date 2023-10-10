<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ClefController extends AbstractController
{
    #[Route('/clef', name: 'clef')]
    public function index(ManagerRegistry $doctrine,Request $request, EntityManagerInterface $clef): Response
    {
        $clef = new Clef;
        $form = $this->createForm(ClefType::class,$clef );
        $form->handleRequest($request);

        if ($form->issubmitted()&& $form->isValid()) 
        {

             $formClef =$form->getData();
             $entityClef =$doctrine->getManager();
             $entityClef->persist($formClef);
             $entityClef->flush;

           return $this->redirectToRoute("home");
        }

        return $this->render('clef/index.html.twig',
        [
            'ClefType' => $form->createView()
        ]);
    }
}