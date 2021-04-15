<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Objectif
 * @ORM\Table(name="objectif", indexes={@ORM\Index(name="fk_objcli", columns={"idClient"})})
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifRepository")
 * @Vich\Uploadable
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
     * @Assert\Length(min=3)
     */
    private $description;

    /**
     * @var int
     * @Assert\Positive
     * @ORM\Column(name="reponse", type="integer", nullable=false)
     */
    private $reponse;

    /**
     * @Assert\Date
     * @var date A "d/m/Y" formatted value
     * @ORM\Column(name="dateDebut", type="string", length=50, nullable=false)
     */
    private $datedebut;

    /**
     * @var int
     * @Assert\Positive
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="mailchecked", type="integer", nullable=true)
     */
    private $mailchecked;

    /**
     * @var string
     *
     * @ORM\Column(name="icone", type="string", length=50, nullable=true)
     */
    private $icone;

    /**
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="objectifs", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;




    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getReponse(): ?int
    {
        return $this->reponse;
    }

    /**
     * @param int $reponse
     */
    public function setReponse(int $reponse): void
    {
        $this->reponse = $reponse;
    }

    /**
     * @return date
     */
    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    /**
     * @param date $datedebut
     */
    public function setDatedebut(string $datedebut): void
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return int
     */
    public function getDuree(): ?int
    {
        return $this->duree;
    }

    /**
     * @param int $duree
     */
    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return int
     */
    public function getMailchecked(): ?int
    {
        return $this->mailchecked;
    }

    /**
     * @param int $mailchecked
     */
    public function setMailchecked(int $mailchecked): void
    {
        $this->mailchecked = $mailchecked;
    }

    /**
     * @return string
     */
    public function getIcone(): ?string
    {
        return $this->icone;
    }

    /**
     * @param string $icone
     */
    public function setIcone(string $icone): void
    {
        $this->icone = $icone;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $icone
     */
    public function setImage(string $image): void
    {
        $this->icone = $image;
    }

    /**
     * @return User
     */
    public function getIdclient(): ?User
    {
        return $this->idclient;
    }

    /**
     * @param User $idclient
     */
    public function setIdclient(User $idclient)
    {
        $this->idclient = $idclient;
    }
    public function __toString(): string
    {
        return $this->description;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
