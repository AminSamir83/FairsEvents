<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exposant
 *
 * @ORM\Table(name="exposant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExposantRepository")
 */
class Exposant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=50)
     */
    private $nomComplet;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, unique=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=50, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stand",mappedBy="exposant")
     */
    private $stands;

    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return Exposant
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Exposant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Exposant
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Exposant
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Exposant
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stands = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stand
     *
     * @param \AppBundle\Entity\Stand $stand
     *
     * @return Exposant
     */
    public function addStand(\AppBundle\Entity\Stand $stand)
    {
        $this->stands[] = $stand;

        return $this;
    }

    /**
     * Remove stand
     *
     * @param \AppBundle\Entity\Stand $stand
     */
    public function removeStand(\AppBundle\Entity\Stand $stand)
    {
        $this->stands->removeElement($stand);
    }

    /**
     * Get stands
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStands()
    {
        return $this->stands;
    }
}
