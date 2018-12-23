<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="cin", type="integer")
     */
    private $cin;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserFoire",mappedBy="user")
     */

    private $userfoires;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Stand", mappedBy="user")
     */
    private $stands;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Add userfoire
     *
     * @param \AppBundle\Entity\UserFoire $userfoire
     *
     * @return User
     */
    public function addUserfoire(\AppBundle\Entity\UserFoire $userfoire)
    {
        $this->userfoires[] = $userfoire;

        return $this;
    }

    /**
     * Remove userfoire
     *
     * @param \AppBundle\Entity\UserFoire $userfoire
     */
    public function removeUserfoire(\AppBundle\Entity\UserFoire $userfoire)
    {
        $this->userfoires->removeElement($userfoire);
    }

    /**
     * Get userfoires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserfoires()
    {
        return $this->userfoires;
    }

    /**
     * Add stand
     *
     * @param \AppBundle\Entity\Stand $stand
     *
     * @return User
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
