<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/nouveau", methods={"GET", "POST"})
     */
    public function nouveau(Request $request)
    {
        $publication = new Publication();
        $publication->setEtat('brouillon');

        $form = $this->createFormBuilder($publication)
            ->add('titre')
            ->add('contenu')
            ->add('auteur')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publication);
            $entityManager->flush();

            return $this->redirectToRoute('app_publication_detail', [
                'id' => $publication->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('publication/nouveau.html.twig', [
            'formView' => $form->createView()
        ]);
    }
}
