<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DevisController extends AbstractController
{
    #[Route('/devis', name: 'devis')]
    public function index(ManagerRegistry $doctrine,Request $request, EntityManagerInterface $Devis): Response
    {
        $Devis = new Devis;
        $form = $this->createForm(DevisFormType::class,$Devis );
        $form->handleRequest($request);

        if ($form->issubmitted()&& $form->isValid()) 
        {

             $formDevis =$form->getData();
             $entityDevis =$doctrine->getManager();
             $entityDevis->persist($formDevis);
             $entityDevis->flush;

           return $this->redirectToRoute("home");
        }

        return $this->render('Devis/index.html.twig',
        [
            'DevisFormType' => $form->createView()
        ]);
    }
}