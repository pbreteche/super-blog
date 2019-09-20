<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $this->denyAccessUnlessGranted('ROLE_USER');

        if (false) {
            throw $this->createAccessDeniedException();
        }

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
}
