<?php

namespace App\Controller\Admin;

use App\Entity\Bois;
use App\Entity\Clef;
use App\Entity\Forme;
use App\Entity\Metal;
use App\Entity\Article;
use App\Controller\Admin\FormeCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class TableauAdminController extends AbstractDashboardController
{
    // creation d'une variable pour généré l'url

    function __construct( private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // easy admin nous propose 3 solution 

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');


        // je fait la solution 1 en prenant  le crud de forme pour basse

        $url = $this->adminUrlGenerator->setController(FormeCrudController::class)->generateUrl();

        return $this->redirect($url);

    }
// configuration du tableau admin///////////////////////////////////////////////////////////////////////////////////////////////
    public function configureDashboard(): Dashboard
    {
        // nom du domaine
        return Dashboard::new()
            ->setTitle('PFAAL2023');
    }

    // configuration des élement composant le tableau admin 
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau administration', 'fa fa-home');
        yield MenuItem::section("Clef"); 
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                MenuItem::linkToCrud("Nouvel Clef", "fas fa-plus", Clef::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud("Voir  Clef", "fas fa-eyes", Clef::class)                

            ]
            );

        yield MenuItem::section("Forme");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                MenuItem::linkToCrud("Nouvel forme",  "fas fa-plus", Forme::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud("Voir  Forme", "fas fa-eyes", Forme::class)                

            ]
            );

        yield MenuItem::section("Metal");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
             [
                MenuItem::linkToCrud("Nouvel metal",  "fas fa-plus", Metal::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud("Voir  Metal", "fas fa-eyes", Metal::class)                
    
            ]
            );
        yield MenuItem::section("Bois");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                MenuItem::linkToCrud("nouveau bois",  "fas fa-plus", Bois::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud("Voir  bois", "fas fa-eyes", Bois::class)                

            ]
        );
        yield MenuItem::section("Articles"); 
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                MenuItem::linkToCrud("nouveau article", "fas fa-plus", Article::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud("Voir  article", "fas fa-eyes", Article::class)                

            ]
            );
       
    }
} 