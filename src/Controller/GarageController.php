<?php

namespace App\Controller;

use App\Entity\ServiceInformations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GarageController extends AbstractController
{
    #[Route('/garage', name: 'app_garage')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ServiceInformations = $entityManager->getRepository(ServiceInformations::class)->findAll();

        return $this->render('garage/index.html.twig', [
            'controller_name' => 'GarageController',
            'ServiceInformations' => $ServiceInformations,
        ]);
    }
}
