<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participationtherapie
 *
 * @ORM\Table(name="participationtherapie")
 * @ORM\Entity
 */
class Participationtherapie
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
     * @ORM\Column(name="id_client", type="string", length=255, nullable=false)
     */
    private $idClient;

    /**
     * @var int
     *
     * @ORM\Column(name="id_therapie", type="integer", nullable=false)
     */
    private $idTherapie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?string
    {
        return $this->idClient;
    }

    public function setIdClient(string $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdTherapie(): ?int
    {
        return $this->idTherapie;
    }

    public function setIdTherapie(int $idTherapie): self
    {
        $this->idTherapie = $idTherapie;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }


}
