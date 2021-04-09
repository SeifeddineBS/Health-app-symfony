<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipationChallenge
 *
 * @ORM\Table(name="participation_challenge", uniqueConstraints={@ORM\UniqueConstraint(name="id_challenge_2", columns={"id_challenge", "id_client"})}, indexes={@ORM\Index(name="id_client", columns={"id_client"}), @ORM\Index(name="IDX_B98EA73A573C3576", columns={"id_challenge"})})
 * @ORM\Entity
 */
class ParticipationChallenge
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
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_points", type="integer", nullable=false)
     */
    private $nbPoints = '0';

    /**
     * @var \Challenge
     *
     * @ORM\ManyToOne(targetEntity="Challenge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_challenge", referencedColumnName="id")
     * })
     */
    private $idChallenge;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idClient;


}
