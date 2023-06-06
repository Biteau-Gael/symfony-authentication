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
<<<<<<< HEAD

    /**
     * @Route("/contact", name="app_cgeneral")
     */
    public function contactGeneral(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendezVous = new RendezVous();

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

=======
>>>>>>> origin/nouvelleConfig
    /**
     * @Route("/contact/{modele}", name="app_contact", defaults={"modele": null})
     */

<<<<<<< HEAD
    public function contact(?string $modele, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (is_null($modele)) {
            // Gérer l'erreur ici, par exemple rediriger vers une autre page ou afficher un message d'erreur.
            throw $this->createNotFoundException('Modèle de voiture non spécifié.');
        }

=======
    public function contact($modele, Request $request, EntityManagerInterface $entityManager): Response
    {
>>>>>>> origin/nouvelleConfig
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
