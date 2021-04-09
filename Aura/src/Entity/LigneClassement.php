<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneClassement
 *
 * @ORM\Table(name="ligne_classement", indexes={@ORM\Index(name="id_niveau", columns={"id_niveau"}), @ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class LigneClassement
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
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_points", type="integer", nullable=false)
     */
    private $nbPoints;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idClient;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_niveau", referencedColumnName="id")
     * })
     */
    private $idNiveau;


}
