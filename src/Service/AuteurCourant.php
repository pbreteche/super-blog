<?php


namespace App\Service;


use App\Entity\Auteur;
use App\Repository\AuteurRepository;
use Symfony\Component\Security\Core\Security;

class AuteurCourant implements AuteurCourantInterface
{

    /**
     * @var \App\Entity\Auteur
     */
    private $auteur;

    public function __construct(Security $security, AuteurRepository $repository)
    {
        $this->auteur = $repository->findOneBy(['utilisateur' => $security->getUser()]);
    }

    /**
     * @return \App\Entity\Auteur|null
     */
    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }


}