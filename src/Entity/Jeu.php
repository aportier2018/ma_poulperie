<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuRepository")
 */
class Jeu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jaquette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $critere;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     
     */
    private $agemin;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     * @Assert\GreaterThan(propertyPath="agemin", message="Attention! l'âge maximum est plus petit que l'âge minimum !")

     */
    private $agemax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prixconcours;

    /**
     * @ORM\Column(type="text")
     */
    private $regle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ambiance;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbjoueurmin;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     * @Assert\GreaterThan(propertyPath="nbjoueurmin", message="Attention! le nombre maximun de joueurs est plus petit que le nombre minimum de joueur(s)!")
     */
    private $nbjoueurmax;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveau", inversedBy="jeux")
     * 
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Duree", inversedBy="jeux")
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getJaquette(): ?string
    {
        return $this->jaquette;
    }

    public function setJaquette(?string $jaquette): self
    {
        $this->jaquette = $jaquette;

        return $this;
    }

    public function getCritere(): ?string
    {
        return $this->critere;
    }

    public function setCritere(string $critere): self
    {
        $this->critere = $critere;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getAgemin(): ?int
    {
        return $this->agemin;
    }

    public function setAgemin(int $agemin): self
    {
        $this->agemin = $agemin;

        return $this;
    }

    public function getAgemax(): ?int
    {
        return $this->agemax;
    }

    public function setAgemax(int $agemax): self
    {
        $this->agemax = $agemax;

        return $this;
    }

    public function getPrixconcours(): ?string
    {
        return $this->prixconcours;
    }

    public function setPrixconcours(?string $prixconcours): self
    {
        $this->prixconcours = $prixconcours;

        return $this;
    }

    public function getRegle(): ?string
    {
        return $this->regle;
    }

    public function setRegle(string $regle): self
    {
        $this->regle = $regle;

        return $this;
    }

    public function getAmbiance(): ?string
    {
        return $this->ambiance;
    }

    public function setAmbiance(?string $ambiance): self
    {
        $this->ambiance = $ambiance;

        return $this;
    }

    public function getNbjoueurmin(): ?int
    {
        return $this->nbjoueurmin;
    }

    public function setNbjoueurmin(int $nbjoueurmin): self
    {
        $this->nbjoueurmin = $nbjoueurmin;

        return $this;
    }

    public function getNbjoueurmax(): ?int
    {
        return $this->nbjoueurmax;
    }

    public function setNbjoueurmax(int $nbjoueurmax): self
    {
        $this->nbjoueurmax = $nbjoueurmax;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getDuree(): ?Duree
    {
        return $this->duree;
    }

    public function setDuree(?Duree $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
