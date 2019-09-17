<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublicationRepository")
 */
class Publication
{
    const ETAT_BROUILLON = 'brouillon';
    const ETAT_PUBLIE = 'publié';
    const ETAT_DEPRECIE = 'déprécié';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $auteur;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publieeLe;

    /**
     * @ORM\Column(type="string", length=32)
     * @Assert\Choice(callback="getEtats")
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $titre;

    public static function getEtats() {
        return [
            self::ETAT_BROUILLON,
            self::ETAT_PUBLIE,
            self::ETAT_DEPRECIE,
        ];
    }

    public function __construct()
    {

        $this->etat = self::ETAT_BROUILLON;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getPublieeLe(): ?\DateTimeInterface
    {
        return $this->publieeLe;
    }

    public function setPublieeLe(?\DateTimeInterface $publieeLe): self
    {
        $this->publieeLe = $publieeLe;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
}
