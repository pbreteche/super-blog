<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicationController extends AbstractController
{
    /**
     * @Route("/", methods="GET")
     */
    public function index(PublicationRepository $repository)
    {
        $publications = $repository->findPubliees();

        return $this->render('publication/index.html.twig', [
            'publications' => $publications,
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id":"\d+"}, methods="GET")
     */
    public function detail(Publication $publication)
    {
        return $this->render('publication/detail.html.twig', [
            'publication' => $publication
        ]);
    }
}
