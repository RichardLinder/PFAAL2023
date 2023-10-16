<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableauAdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();

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
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PFAAL2023');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section("Clef"); 
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                // MenuItem::linkToCrud("Nouvel clef", "fas fa-plus", Keyp::class)->setAction(Crud::PAGE_NEW),
                // MenuItem::linkToCrud("Voir  clef", "fas fa-eyes", Keyp::class)                

            ]
            );

        yield MenuItem::section("Forme");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                // MenuItem::linkToCrud("Nouvel forme",  "fas fa-plus", Shape::class)->setAction(Crud::PAGE_NEW),
                // MenuItem::linkToCrud("Voir  Forme", "fas fa-eyes", Shape::class)                

            ]
            );

        yield MenuItem::section("Metal");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
             [
            //     MenuItem::linkToCrud("Nouvel metal",  "fas fa-plus", Metal::class)->setAction(Crud::PAGE_NEW),
            //     MenuItem::linkToCrud("Voir  Metal", "fas fa-eyes", Metal::class)                
    
            ]
            );
        yield MenuItem::section("Bois");
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                // MenuItem::linkToCrud("nouveau bois",  "fas fa-plus", Wood::class)->setAction(Crud::PAGE_NEW),
                // MenuItem::linkToCrud("Voir  bois", "fas fa-eyes", Wood::class)                

            ]
        );
        yield MenuItem::section("Articles"); 
        yield MenuItem::subMenu("Actions", "fas-bars")->setSubItems
        (
            [
                // MenuItem::linkToCrud("nouveau article", "fas fa-plus", Article::class)->setAction(Crud::PAGE_NEW),
                // MenuItem::linkToCrud("Voir  article", "fas fa-eyes", Article::class)                

            ]
            );
       
    }
// test
} 