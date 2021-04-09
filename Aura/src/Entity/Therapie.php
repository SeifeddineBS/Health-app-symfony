<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Therapie
 *
 * @ORM\Table(name="therapie")
 * @ORM\Entity
 */
class Therapie
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
     * @ORM\Column(name="sujet", type="string", length=254, nullable=false)
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
     * @ORM\Column(name="lieu", type="string", length=254, nullable=false)
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
     * @ORM\Column(name="idcoach", type="string", length=254, nullable=false)
     */
    private $idcoach;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_parti", type="integer", nullable=false)
     */
    private $nombreParti = '0';


}
