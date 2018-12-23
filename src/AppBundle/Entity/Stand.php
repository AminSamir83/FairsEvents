<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Stand
 *
 * @ORM\Table(name="stand")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StandRepository")
 */
class Stand
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
     * @var int
     * @Assert\NotBlank(message="veuillez remplir ce champ")
     * @Assert\Type(type="Integer")
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var bool
     * @ORM\Column(name="isReserved", type="boolean")
     */
    private $isReserved;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="stands")
     */
    private $user;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Foire",inversedBy="stands")
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Stand
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set isReserved
     *
     * @param boolean $isReserved
     *
     * @return Stand
     */
    public function setIsReserved($isReserved)
    {
        $this->isReserved = $isReserved;

        return $this;
    }

    /**
     * Get isReserved
     *
     * @return bool
     */
    public function getIsReserved()
    {
        return $this->isReserved;
    }

    /**
     * Set exposant
     *
     * @param \AppBundle\Entity\Exposant $exposant
     *
     * @return Stand
     */
    public function setExposant(\AppBundle\Entity\Exposant $exposant = null)
    {
        $this->exposant = $exposant;

        return $this;
    }

    /**
     * Get exposant
     *
     * @return \AppBundle\Entity\Exposant
     */
    public function getExposant()
    {
        return $this->exposant;
    }

    /**
     * Set foire
     *
     * @param \AppBundle\Entity\Foire $foire
     *
     * @return Stand
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Stand
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
}
