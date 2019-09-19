<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontPublicationController extends AbstractController
{
    /**
     * @Route("/", methods="GET")
     */
    public function index(PublicationRepository $repository)
    {
        $publications = $repository->findPubliees();

        return $this->render('front-publication/index.html.twig', [
            'publications' => $publications,
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id":"\d+"}, methods="GET")
     */
    public function detail(Publication $publication)
    {
        // Sous-requête effectuée depuis le contrôleur
        $this->forward('App\\Controller\\FrontPublicationController::memeAuteur', [
           'publication' => $publication,
        ]);

        return $this->render('front-publication/detail.html.twig', [
            'publication' => $publication,
        ]);
    }

    public function memeAuteur(Publication $publication, PublicationRepository $repository)
    {
        $memeAuteur = $repository->findMemeAuteur($publication);

        return $this->render('front-publication/meme-auteur.html.twig', [
            'memeAuteur' => $memeAuteur,
        ]);
    }

    /**
     * @Route("/nouveau", methods={"GET", "POST"})
     */
    public function nouveau(Request $request)
    {
        $publication = new Publication();

        $form = $this->createForm(PublicationType::class, $publication);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publication);
            $entityManager->flush();

            $this->addFlash('succes', 'Merci de votre contribution!');

            return $this->redirectToRoute('app_frontpublication_detail', [
                'id' => $publication->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front-publication/nouveau.html.twig', [
            'formView' => $form->createView()
        ]);
    }
}
