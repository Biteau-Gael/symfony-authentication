<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{modele}", name="app_contact", defaults={"modele": null})
     */

    public function contact($modele, Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendezVous = new RendezVous();
        $rendezVous->setModele($modele);

        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez les données du formulaire (par exemple, enregistrez-les en base de données)

            $rendezvous = $form->getData();
            $entityManager->persist($rendezvous);
            $entityManager->flush();
            // Redirigez l'utilisateur vers une page de confirmation
            return $this->redirectToRoute('app_confirmation');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/confirmation", name="app_confirmation")
     */
    public function confirmation(): Response
    {
        return $this->render('contact/confirmation.html.twig');
    }
}
