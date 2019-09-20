<?php


namespace App\Service;


use App\Entity\Auteur;

interface AuteurCourantInterface
{
    public function getAuteur(): ?Auteur;

}