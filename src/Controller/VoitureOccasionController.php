<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\VoitureOccasion;
use App\Form\VoitureOccasionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VoitureOccasionRepository;

class VoitureOccasionController extends AbstractController
{

    /**
     * @Route("/voiture/enregistrer", name="voiture_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $voitureOccasion = new VoitureOccasion();

        $form = $this->createForm(VoitureOccasionType::class, $voitureOccasion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->get('images')->getData();

            foreach ($images as $imageFile) {
                if ($imageFile instanceof UploadedFile) {
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                    try {
                        $imageFile->move(
                            $this->getParameter('images_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // Gérez l'exception si quelque chose se passe mal lors du téléchargement du fichier
                    }

                    $image = new Image();
                    $image->setChemin($newFilename);

                    $voitureOccasion->addImage($image);
                }
            }

            $entityManager->persist($voitureOccasion);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_occasion');
        }

        return $this->render('voiture_occasion/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


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

        return $this->render('voiture_occasion/show.html.twig', ['voiture' => $voiture, 'images' => $voiture->getImages()]);
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
                'image' => $voiture->getImages()
            ];
        }

        return new JsonResponse($voituresArray);
    }



}
