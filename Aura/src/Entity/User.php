<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Validators as MyValidate;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     * @ORM\Id
     * @MyValidate\VerifCin
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @MyValidate\VerifNull
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * @MyValidate\VerifNull
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @MyValidate\VerifEmail
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @MyValidate\VerifPassword
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=false)
     * @MyValidate\VerifTel
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=false)
     * @MyValidate\VerifNull
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     * @MyValidate\VerifNull
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="rme", type="string", length=255, nullable=false, options={"default"="N"})
     */
    private $rme = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=false)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="sms", type="string", length=255, nullable=false, options={"default"="N"})
     */
    private $sms = 'N';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }



    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRme(): ?string
    {
        return $this->rme;
    }

    public function setRme(string $rme): self
    {
        $this->rme = $rme;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSms(): ?string
    {
        return $this->sms;
    }

    public function setSms(string $sms): self
    {
        $this->sms = $sms;

        return $this;
    }


    public function getRoles()
    {
        return [
            'ROLE_USER'
        ];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->id;

    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function serialize()
    {
        return serialize(
          [
            $this->id,
              $this->nom,
              $this->prenom,
              $this->email,
              $this->password,
              $this->tel,
              $this->adresse,
              $this->specialite,
              $this->sms,
              $this->rme,
              $this->picture,
              $this->role
          ]

        );
        // TODO: Implement serialize() method.
    }

    public function unserialize($string)
    {
        list(
            $this->id,
            $this->nom,
            $this->prenom,
            $this->email,
            $this->password,
            $this->tel,
            $this->adresse,
            $this->specialite,
            $this->sms,
            $this->rme,
            $this->picture,
            $this->role

            )=unserialize($string,['allowed_classes'=>false]);
    }
}
