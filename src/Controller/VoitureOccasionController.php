<?php

namespace App\Controller;

use App\Entity\VoitureOccasion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VoitureOccasionRepository;

class VoitureOccasionController extends AbstractController
{
    /**
     * @Route("/vehicule/occasion", name="vehicule_occasion")
     */
    public function index(VoitureOccasionRepository $repo)
    {
        $voitures = $repo->findAll();

        return $this->render('voiture_occasion/index.html.twig', [
            'VoitureOccasion' => $voitures,
        ]);
    }
    /**
     * @Route("/vehicule/occasion/{id}", name="voiture_detail")
     */
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $voiture = $entityManager
            ->getRepository(VoitureOccasion::class)
            ->find($id);

        if (!$voiture) {
            throw $this->createNotFoundException(
                'Aucune voiture avec l\'id '.$id.' trouvée'
            );
        }

        return $this->render('voiture_occasion/show.html.twig', ['voiture' => $voiture]);
    }
    // src/Controller/VoitureOccasionController.php

    /**
     * @Route("/voitures/occasion/filtre", name="voiture_filtrer")
     */
    public function filtre(Request $request, VoitureOccasionRepository $repo)
    {
        $minPrix = $request->query->get('minPrix');
        $maxPrix = $request->query->get('maxPrix');
        $minKilometre = $request->query->get('minKilometre');
        $maxKilometre = $request->query->get('maxKilometre');
        $minAnnee = $request->query->get('minAnnee');
        $maxAnnee = $request->query->get('maxAnnee');

        $voitures = $repo->filter($minPrix, $maxPrix, $minKilometre, $maxKilometre, $minAnnee, $maxAnnee);

        $voituresArray = [];
        foreach ($voitures as $voiture) {
            $voituresArray[] = [
                'id' => $voiture->getId(),
                'marque' => $voiture->getMarque(),
                'modele' => $voiture->getModele(),
                'annee' => $voiture->getAnnee(),
                'prix' => $voiture->getPrix(),
                'Kilometre' => $voiture->getKilometre(),
                'image' => $voiture->getImage()
            ];
        }

        return new JsonResponse($voituresArray);
    }



}
