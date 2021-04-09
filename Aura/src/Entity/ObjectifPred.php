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


}
