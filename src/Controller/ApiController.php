<?php

namespace App\Controller;

use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index(PublicationRepository $repository)
    {
        $dataSource = $repository->findPublieesTableau();

        $data = array_map(function($publi){
            $publi['link'] = $this->generateUrl('app_frontpublication_detail', ['id' => $publi['id']], UrlGeneratorInterface::ABSOLUTE_URL);
            unset($publi['id']);
            return $publi;
        }, $dataSource);

        return $this->json($data);
    }
}