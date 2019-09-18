<?php

namespace App\Controller;

use App\Form\PublicationDateType;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class BackPublicationController extends AbstractController
{

    /**
     * @Route("/", methods={"GET", "POST"})
     */
    public function tableauDeBord(PublicationRepository $repository, Request $request)
    {
        $publications = $repository->findBrouillons();

        $form = $this->createFormBuilder()
            ->add('publications', CollectionType::class, [
                'entry_type' => PublicationDateType::class,
                'data' => $publications,
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            foreach($publications as $publication) {
                $manager->persist($publication);
            };
            $manager->flush();

            return $this->redirectToRoute('app_backpublication_tableaudebord', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back-publication/tableau-de-bord.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
