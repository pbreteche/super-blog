<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationDateType;
use App\Form\PublicationType;
use App\Repository\PublicationRepository;
use App\Service\AuteurCourantInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 * @IsGranted("ROLE_ADMIN")
 */
class BackPublicationController extends AbstractController
{

    /**
     * @Route("/", methods={"GET", "POST"})
     */
    public function tableauDeBord(PublicationRepository $repository, Request $request)
    {
        $user = $this->getUser();

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

    /**
     * @Route("/nouveau", methods={"GET", "POST"}, defaults={"action": "creer"})
     * @IsGranted("ROLE_USER")
     */
    public function nouveau(string $action, AuteurCourantInterface $auteurCourant)
    {
        $publication = new Publication();
        $publication->setEcritPar($auteurCourant->getAuteur());

        return $this->forward('App\\Controller\\BackPublicationController::editer', [
            'publication' => $publication,
            'action' => $action
        ]);
    }

    /**
     * @Route("/{id}/editer", methods={"GET", "POST"}, defaults={"action": "modifier"})
     * @IsGranted("PUBLICATION_EDITER", subject="publication")
     */
    public function editer(Publication $publication, Request $request, string $action)
    {
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

        return $this->render('back-publication/formulaire.html.twig', [
            'formView' => $form->createView(),
            'action' => $action,
        ]);
    }
}
