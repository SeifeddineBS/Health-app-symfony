<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participationactivte
 *
 * @ORM\Table(name="participationactivte")
 * @ORM\Entity
 */
class Participationactivte
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
     * @ORM\Column(name="id_activite", type="integer", nullable=false)
     */
    private $idActivite;

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

    public function getIdActivite(): ?int
    {
        return $this->idActivite;
    }

    public function setIdActivite(int $idActivite): self
    {
        $this->idActivite = $idActivite;

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
