<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $Nom_Projet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $Lien_GitHub;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProjet(): ?string
    {
        return $this->Nom_Projet;
    }

    public function setNomProjet(?string $Nom_Projet): self
    {
        $this->Nom_Projet = $Nom_Projet;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLienGitHub(): ?string
    {
        return $this->Lien_GitHub;
    }

    public function setLienGitHub(?string $Lien_GitHub): self
    {
        $this->Lien_GitHub = $Lien_GitHub;

        return $this;
    }
}
