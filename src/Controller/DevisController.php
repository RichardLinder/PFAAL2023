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
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DevisController extends AbstractController
{

    #[Route('/devis', name: 'devis')]
    public function index(ManagerRegistry $doctrine,Request $request, EntityManagerInterface $entityManager): Response
    {
                    // crée le statut du contrat avec l'id 1 donc devis a validé

    $statut = $entityManager->getRepository(Statut::class)->find(1);

        //remplir le devis
        $devis = new Devis;
        // ajout de l'utilsateur en cour
        $devis->setUtilisateur($this->GetUser());
        //gardé ???
        $devis->setEsAccepter(false);
        // ajout du statut
        $devis->setStatut($statut);



// creation du form du devis
        $form = $this->createForm(DevisFormType::class,$devis );
        $form->handleRequest($request);

        // algoritme : si le formulaire es soumis et qu'il es valide a lord dans ce cas faire l'opération entre les crochets
        if ($form->issubmitted()&& $form->isValid()) 
        {



            // recupéré les donné
             $formDevis =$form->getData();

             // utilisation de la fonction get mannager pour avoir la fonction d'insertion de donné de doctrine
             $entityDevis =$doctrine->getManager();
             // prepare la requet
             $entityDevis->persist($formDevis);
             // lance la requet dans le sql
             $entityDevis->flush();

             // renvoie a la page d'acuille a voir si on renvoie dans une autre page 
           return $this->redirectToRoute("app_accueil");
        }
// appelé la page devis
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

        

        $statut = $entityManager->getRepository(Statut::class)->find(2);

        // clef =new Clef

        // changer le statut a 2 devis validé mais non accepté
        $devis->setStatut($statut);
        $entityManager->flush();        
        return $this->redirectToRoute("app_accueil");
    }
    #[Route('vosClees', name: 'vosClef')]
    public function vosClef(DevisRepository $devisRepository): Response

    
    {
        // recuperation de l'id de l'utilisateur en cour en 1er en recupérant l'utilisateur en cour
        $user = $this->getUser();

// test if pour verifié que l'utilisateur es bien instancié
        if(!empty($user)){


            $devis =  $devisRepository->findBy(['Utilisateur' => $user->getId()]);
            
            return $this->render('/devis/utilisateur.html.twig',
            [
                'deviss' => $devis
            ]); 
        }else
        return $this->render('/404.html.twig');


   
    }
}