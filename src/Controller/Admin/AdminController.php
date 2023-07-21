<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use App\Entity\HorairesOuvertures;
use App\Entity\RendezVous;
use App\Entity\ServiceInformations;
use App\Entity\Temoignage;
use App\Entity\User;
use App\Entity\VoitureOccasion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(RendezVousCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V.Pannot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Horaires', 'fa-solid fa-clock', Horaire::class);
        yield MenuItem::linkToUrl('Retour à l\'accueil', 'fas fa-home', '/');
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', HorairesOuvertures::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-bell-concierge', ServiceInformations::class);
        yield MenuItem::linkToCrud('Témoignages', 'fas fa-square-poll-vertical', Temoignage::class);



    }
}
