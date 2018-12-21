<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=50)
     */
    private $pays;
    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Hotel",mappedBy="ville")
     */
    private $hotels;
    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Foire",mappedBy="ville")
     */
    private $foires;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Ville
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
     * Set pays
     *
     * @param string $pays
     *
     * @return Ville
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hotels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->foires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     *
     * @return Ville
     */
    public function addHotel(\AppBundle\Entity\Hotel $hotel)
    {
        $this->hotels[] = $hotel;

        return $this;
    }

    /**
     * Remove hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     */
    public function removeHotel(\AppBundle\Entity\Hotel $hotel)
    {
        $this->hotels->removeElement($hotel);
    }

    /**
     * Get hotels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHotels()
    {
        return $this->hotels;
    }

    /**
     * Add foire
     *
     * @param \AppBundle\Entity\Foire $foire
     *
     * @return Ville
     */
    public function addFoire(\AppBundle\Entity\Foire $foire)
    {
        $this->foires[] = $foire;

        return $this;
    }

    /**
     * Remove foire
     *
     * @param \AppBundle\Entity\Foire $foire
     */
    public function removeFoire(\AppBundle\Entity\Foire $foire)
    {
        $this->foires->removeElement($foire);
    }

    /**
     * Get foires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFoires()
    {
        return $this->foires;
    }
}
