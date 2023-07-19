<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HorairesOuverturesController extends AbstractController
{
    #[Route('/horaires/ouvertures', name: 'app_horaires_ouvertures')]
    public function index(): Response
    {
        return $this->render('horaires_ouvertures/index.html.twig', [
            'controller_name' => 'HorairesOuverturesController',
        ]);
    }
}
