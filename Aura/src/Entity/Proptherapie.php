<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proptherapie
 *
 * @ORM\Table(name="proptherapie")
 * @ORM\Entity
 */
class Proptherapie
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
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="nombremax", type="integer", nullable=false)
     */
    private $nombremax;

    /**
     * @var string
     *
     * @ORM\Column(name="idcoach", type="string", length=255, nullable=false)
     */
    private $idcoach;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_parti", type="integer", nullable=false)
     */
    private $nombreParti;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNombremax(): ?int
    {
        return $this->nombremax;
    }

    public function setNombremax(int $nombremax): self
    {
        $this->nombremax = $nombremax;

        return $this;
    }

    public function getIdcoach(): ?string
    {
        return $this->idcoach;
    }

    public function setIdcoach(string $idcoach): self
    {
        $this->idcoach = $idcoach;

        return $this;
    }

    public function getNombreParti(): ?int
    {
        return $this->nombreParti;
    }

    public function setNombreParti(int $nombreParti): self
    {
        $this->nombreParti = $nombreParti;

        return $this;
    }


}
