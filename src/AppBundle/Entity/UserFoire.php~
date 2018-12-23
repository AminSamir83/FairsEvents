<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserFoire
 *
 * @ORM\Table(name="user_foire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserFoireRepository")
 */
class UserFoire
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
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;
    /**
    * @var
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="userfoires")
    */
    private $user;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Foire",inversedBy="userfoires")
     */
    private $foire;

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
     * Set valide
     *
     * @param boolean $valide
     *
     * @return UserFoire
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return bool
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return UserFoire
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set foire
     *
     * @param \AppBundle\Entity\Foire $foire
     *
     * @return UserFoire
     */
    public function setFoire(\AppBundle\Entity\Foire $foire = null)
    {
        $this->foire = $foire;

        return $this;
    }

    /**
     * Get foire
     *
     * @return \AppBundle\Entity\Foire
     */
    public function getFoire()
    {
        return $this->foire;
    }
}
