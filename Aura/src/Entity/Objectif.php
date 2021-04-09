<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;


}
