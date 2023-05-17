<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/salarié", name="home")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->getAll();

        return $this->render('home/index.html.twig', [
            'users' => $users,
        ]);
    }
}
