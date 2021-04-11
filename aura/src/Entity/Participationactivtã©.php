<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participationactivtã©
 *
 * @ORM\Table(name="participationactivtÃ©")
 * @ORM\Entity
 */
class Participationactivtã©
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

    /**
     * @var int|null
     *
     * @ORM\Column(name="aime", type="integer", nullable=true)
     */
    private $aime = '0';


}
