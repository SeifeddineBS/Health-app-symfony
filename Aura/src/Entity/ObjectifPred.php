<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjectifPred
 *
 * @ORM\Table(name="objectif_pred", indexes={@ORM\Index(name="fk_ObjAd", columns={"idAdmin"})})
 * @ORM\Entity
 */
class ObjectifPred
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
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="icone", type="string", length=50, nullable=false)
     */
    private $icone;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdmin", referencedColumnName="id")
     * })
     */
    private $idadmin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getIdadmin(): ?User
    {
        return $this->idadmin;
    }

    public function setIdadmin(?User $idadmin): self
    {
        $this->idadmin = $idadmin;

        return $this;
    }


}
