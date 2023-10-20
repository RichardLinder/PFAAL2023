<?php

namespace App\Controller;

use App\Entity\Clef;
use App\Entity\Devis;
use App\Entity\Statut;
use App\Form\DevisFormType;
use App\Repository\DevisRepository;
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
        $devis = new Devis;
        $devis->setUtilisateur($this->GetUser());
        $devis->setEsAccepter(false);
        $devis->setStatut(null);



        $form = $this->createForm(DevisFormType::class,$devis );
        $form->handleRequest($request);

        if ($form->issubmitted()&& $form->isValid()) 
        {

             $formDevis =$form->getData();
             $entityDevis =$doctrine->getManager();
             $entityDevis->persist($formDevis);
             $entityDevis->flush();

           return $this->redirectToRoute("accueil");
        }

        return $this->render('Devis/index.html.twig',
        [
            'formDevis' => $form->createView()
        ]);
    }
    #[Route('/devis/admin', name: 'devisAdmin')]
    public function devisAdmin(DevisRepository $devisRepository): Response
    {
        $devis =  $devisRepository->findBy([], ["id" => "ASC"]);

        return $this->render('devis/admin.html.twig',
        [
            'deviss' => $devis
        ]);
    }
    #[Route('/devis/admin/accepterDevis{id}', name: 'accepterDevis')]
    public function validationDevis(EntityManagerInterface $entityManager ,int $id) : Response
    {

        $devis = $entityManager->getRepository(Devis::class)->find($id);

        if (!$devis) {
            throw $this->createNotFoundException(
                'Devis non trouvé '.$id
            );
        }

        clef =new Clef
        $devis->setEsAccepter(true);
        $entityManager->flush();        
        return $this->redirectToRoute("app_accueil");
    }
}