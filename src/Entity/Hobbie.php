<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HobbieRepository")
 */
class Hobbie
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
    private $Hobbie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHobbie(): ?string
    {
        return $this->Hobbie;
    }

    public function setHobbie(?string $Hobbie): self
    {
        $this->Hobbie = $Hobbie;

        return $this;
    }
}
