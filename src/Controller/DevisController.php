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
        // block l'acces si n'est pas un utilisisateur 
        $this->denyAccessUnlessGranted('ROLE_USER');
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

    // creation de la function de control des devis partie administration
    #[Route('/devis/admin', name: 'devisAdmin')]
    public function devisAdmin(DevisRepository $devisRepository): Response
    {
        //  restraint l'accès au admin
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        


        $devisAValide = $devisRepository->findBy(
            ['Statut' => '1'],
            ['id' => 'ASC']
        );

        $devisValide = $devisRepository->findBy(
            ['Statut' => '2'],
            ['id' => 'ASC']
        );
        $devisAccepter = $devisRepository->findBy(
            ['Statut' => '3'],
            ['id' => 'ASC']
        );
        $devisRefuse = $devisRepository->findBy(
            ['Statut' => '4'],
            ['id' => 'ASC']
        );
        $clefFinis = $devisRepository->findBy(
            ['Statut' => '5'],
            ['id' => 'ASC']
        );
        return $this->render('devis/admin.html.twig',
        [
            'devisAValides' => $devisAValide,
            'devisValides' => $devisValide,
            'devisAccepters' => $devisAccepter,
            'devisRefuses' => $devisRefuse,
            'clefFinis' => $clefFinis
        ]);
    }

    // function qui permet a l'admin de validé le devis 
    #[Route('/devis/admin/validerDevis{id}', name: 'validerDevis')]
    public function validationDevis(EntityManagerInterface $entityManager ,int $id) : Response
    {

        // ne permet l'accès que au admin
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

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
            // seul les utilisateur y on accès
            $this->denyAccessUnlessGranted('ROLE_USER');
            // recuperation de l'id de l'utilisateur en cour en 1er en recupérant l'utilisateur en cour
            $user = $this->getUser();
    // test if pour verifié que l'utilisateur es bien instancié
            if(!empty($user)){
     
                // apel a la fucntion du repository
                $devisAValide= $devisRepository->FindDevisByIdPourAvalide($user->getId(),1);
                $devisValide= $devisRepository->FindDevisByIdPourAvalide($user->getId(),2);
                $devisAccepter= $devisRepository->FindDevisByIdPourAvalide($user->getId(),3);
                $devisRefuse= $devisRepository->FindDevisByIdPourAvalide($user->getId(),4);
                $clefFinis= $devisRepository->FindDevisByIdPourAvalide($user->getId(),5);

                
                return $this->render('/devis/utilisateur.html.twig',
                [

                    'devisAValides' => $devisAValide,
                    'devisValides' => $devisValide,
                    'devisAccepters' => $devisAccepter,
                    'devisRefuses' => $devisRefuse,
                    'clefFinis' => $clefFinis
                ]); 
            }else
            return $this->render('/404.html.twig');
      
    }

    #[Route('/devis/utilisateur/accepterDevis{id}', name: 'acepterDevis')]

    public function acepterDevis(ManagerRegistry $doctrine ,EntityManagerInterface $entityManager ,int $id) : Response
    {
        // seul les utilisateur peuvent faire cette action
        $this->denyAccessUnlessGranted('ROLE_USER');

        // recupération du statut 3
        $statut = $entityManager->getRepository(Statut::class)->find(3);
        //recupération de l'user
        $user = $this->getUser();
        

        $devis = $entityManager->getRepository(Devis::class)->find($id);
          // verifie que l'on a trouvé le devis
          if (!$devis) {
            throw $this->createNotFoundException(
                'Devis non trouvé '.$id
            );
        } 
        // verifie que le devis demandé es bien celui de l'utilisateur 
        if ($devis->getUtilisateur()->getId()== $user->getId()) 
        {
            // verifie que le statue es bien celui de a  validé
            if ($devis->getStatut()->getID()==2) 
            {
                // change le statut a accepter
                $devis->setStatut($statut);            

                // creation de la clef associè au devis
                $clef = new Clef
                ( 
                    $devis->getNumerosDeSerieSerrure(),
                    $devis->getMetal()->getTitreMetal(),
                    $devis->getForme()->getTitreForme(),
                    $devis->getBois()->getTitreBois()
                );
                    
                    
                    $entityDevis =$doctrine->getManager();
                    // prepare la requet
                    $entityDevis->persist($clef);
                    // ajout de la clef en    
                    $devis->setClef($clef);
                    // lance les requet dans le sql
                    $entityDevis->flush();       
                    $entityManager->flush();
                return $this->redirectToRoute('vosClef');           
            }
        }else 
        {
            return $this->redirectToRoute('app_quatreCentQuatre');
            
        }
      
    }
    

    #[Route('/devis/utilisateur/refuserDevis{id}', name: 'refuserDevis')]

    public function refuserDevis(EntityManagerInterface $entityManager ,int $id) : Response
    
    
    {
        // seul les utilisateur peuvent faire cette action 
               // recupération du statut 4
               $statut = $entityManager->getRepository(Statut::class)->find(4);
        
        $devis = $entityManager->getRepository(Devis::class)->find($id);
        // recupération de l'user actuel
        $user = $this->getUser();


        // verifie que l'on a trouvé le devis
        if (!$devis) {
            throw $this->createNotFoundException(
                'Devis non trouvé '.$id
            );
        } 
        // verifie que le devis demandé es bien celui de l'utilisateur 
        if ($devis->getUtilisateur()->getId()== $user->getId()) 
        {


            // verifie que le statue es bien celui de a  validé
            if ($devis->getStatut()->getID()==2) 
            {
                // change le statut a refusé
                $devis->setStatut($statut);
                $entityManager->flush();
                return $this->redirectToRoute('vosClef');                  
            }
        }else 
        {
            return $this->redirectToRoute('app_quatreCentQuatre');
            
        }
        return $this->redirectToRoute('vosClef');


    }


    // function qui permet a l'admin indiqué la finnition de la clef 
    #[Route('/devis/admin/clefFinis{id}', name: 'clefFinis')]
    public function clefFinis(EntityManagerInterface $entityManager ,int $id) : Response
    {
        // seul les admin peuvent faire cette action
        $this->denyAccessUnlessGranted('ROLE_ADMIN');


        $devis = $entityManager->getRepository(Devis::class)->find($id);

        if (!$devis) {
            throw $this->createNotFoundException(
                'Devis non trouvé '.$id
            );
        }      

        $statut = $entityManager->getRepository(Statut::class)->find(5);
        // changer le statut a clef finis
        $devis->setStatut($statut);
        $entityManager->flush();        
        return $this->redirectToRoute("app_accueil");
    }

}