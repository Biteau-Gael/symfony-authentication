<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/salarié", name="liste_salarié")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('home/index.html.twig', [
            'users' => $users,
        ]);
    }
}
