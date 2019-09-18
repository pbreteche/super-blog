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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Auteur", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecritPar;

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
        if (!$publieeLe) return $this;

        if ($this->etat != self::ETAT_BROUILLON) {
            throw new \Exception('Seul un brouillon peut être publié');
        }
        $this->publieeLe = $publieeLe;
        $this->etat = self::ETAT_PUBLIE;

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

    public function getEcritPar(): ?Auteur
    {
        return $this->ecritPar;
    }

    public function setEcritPar(?Auteur $ecritPar): self
    {
        $this->ecritPar = $ecritPar;

        return $this;
    }
}
