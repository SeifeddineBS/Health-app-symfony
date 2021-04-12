<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipationChallengeRepository")
 *  @ORM\Table(name="`participation_challenge`")
 */
class ParticipationChallenge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=8)
     */
    private $idClient;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $idChallenge;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $etat;

     



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?string
    {
        return $this->idClient;
    }

    public function setIdCient(string $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(int $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }

    public function getIdChallenge(): ?int
    {
        return $this->idChallenge;
    }

    public function setIdChallenge(int $idChallenge): self
    {
        $this->idChallenge = $idChallenge;

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
}
