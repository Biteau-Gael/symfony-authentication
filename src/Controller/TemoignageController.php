<?php

namespace App\Controller;

use App\Entity\Temoignage;
use App\Form\TemoignageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemoignageController extends AbstractController
{
    /**
     * @Route("/laisser-un-temoignage", name="laisser_temoignage")
     */
    public function laisserTemoignage(Request $request, EntityManagerInterface $entityManager): Response
    {
        $temoignage = new Temoignage();
        $form = $this->createForm(TemoignageType::class, $temoignage);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez le formulaire et enregistrez le témoignage en base de données

            $entityManager->persist($temoignage);
            $entityManager->flush();


            // Redirigez vers la page d'accueil ou une autre page appropriée
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('temoignage/temoignage.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
