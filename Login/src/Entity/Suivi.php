<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivi
 *
 * @ORM\Table(name="suivi", indexes={@ORM\Index(name="fk_SuivObj", columns={"idObjectif"}), @ORM\Index(name="fk_SuivCli", columns={"idClient"})})
 * @ORM\Entity
 */
class Suivi
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
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer", nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=50, nullable=false)
     */
    private $date;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;

    /**
     * @var \Objectif
     *
     * @ORM\ManyToOne(targetEntity="Objectif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idObjectif", referencedColumnName="id")
     * })
     */
    private $idobjectif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdclient(): ?User
    {
        return $this->idclient;
    }

    public function setIdclient(?User $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdobjectif(): ?Objectif
    {
        return $this->idobjectif;
    }

    public function setIdobjectif(?Objectif $idobjectif): self
    {
        $this->idobjectif = $idobjectif;

        return $this;
    }


}
