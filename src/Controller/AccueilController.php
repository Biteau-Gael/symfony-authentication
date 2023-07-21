<?php

namespace App\Controller;

use App\Entity\HorairesOuvertures;
use App\Repository\HorairesOuverturesRepository;
use App\Repository\TemoignageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EntityManagerInterface $entityManager, TemoignageRepository $temoignageRepository): Response
    {

        $temoignages = $temoignageRepository->findBy(['approuve' => true]);


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'temoignages' => $temoignages,

        ]);
    }


}
