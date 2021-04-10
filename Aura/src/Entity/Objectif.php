<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Objectif
 *
 * @ORM\Table(name="objectif", indexes={@ORM\Index(name="fk_objcli", columns={"idClient"})})
 * @ORM\Entity
 */
class Objectif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="reponse", type="integer", nullable=false)
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDebut", type="string", length=50, nullable=false)
     */
    private $datedebut;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="mailchecked", type="integer", nullable=false)
     */
    private $mailchecked;

    /**
     * @var string
     *
     * @ORM\Column(name="icone", type="string", length=50, nullable=false)
     */
    private $icone;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;




    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getReponse(): ?int
    {
        return $this->reponse;
    }

    /**
     * @param int $reponse
     */
    public function setReponse(int $reponse): void
    {
        $this->reponse = $reponse;
    }

    /**
     * @return string
     */
    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    /**
     * @param string $datedebut
     */
    public function setDatedebut(string $datedebut): void
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return int
     */
    public function getDuree(): ?int
    {
        return $this->duree;
    }

    /**
     * @param int $duree
     */
    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return int
     */
    public function getMailchecked(): ?int
    {
        return $this->mailchecked;
    }

    /**
     * @param int $mailchecked
     */
    public function setMailchecked(int $mailchecked): void
    {
        $this->mailchecked = $mailchecked;
    }

    /**
     * @return string
     */
    public function getIcone(): ?string
    {
        return $this->icone;
    }

    /**
     * @param string $icone
     */
    public function setIcone(string $icone): void
    {
        $this->icone = $icone;
    }

    /**
     * @return User
     */
    public function getIdclient(): ?User
    {
        return $this->idclient;
    }

    /**
     * @param User $idclient
     */
    public function setIdclient(User $idclient)
    {
        $this->idclient = $idclient;
    }


}
