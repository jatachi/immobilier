<?php

namespace App\Controller\Admin;

use App\Entity\Header;
use App\Entity\Property;
use App\Entity\Attachements;
use App\Entity\Presentation;
use App\Entity\TypeProperty;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\PropertyCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/back-office", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(PropertyCrudController::class)->generateUrl());
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Schama immmobilier');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Type de Propriété', 'fas fa-list', TypeProperty::class);
        yield MenuItem::linkToCrud('Proprietés', 'fas fa-home', Property::class);
        yield MenuItem::linkToCrud('Headers', 'fas fa-desktop', Header::class);
        yield MenuItem::linkToCrud('Attachement', 'fas fa-desktop', Attachements::class);
        yield MenuItem::linkToCrud('Présentation', 'fas fa-desktop', Presentation::class);
    }
}
