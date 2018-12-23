<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

/**
 * Foire
 *
 * @ORM\Table(name="foire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FoireRepository")
 */
class Foire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *  @Assert\NotBlank(message="veuillez remplir ce champ")
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var \DateTime
     * @Assert\DateTime()
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     * @Assert\GreaterThanOrEqual(
     *     propertyPath="dateDebut"
     * )
     * @Assert\DateTime()
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     * @Assert\NotBlank(message="veuillez remplir ce champ")
     * @ORM\Column(name="categorie", type="string", length=50)
     */
    private $categorie;

    /**
     * @var int
     *  @Assert\NotBlank(message="veuillez remplir ce champ")
     *  @Assert\Type(type="Integer")
     * @ORM\Column(name="nbreStandsTotal", type="integer")
     */
    private $nbreStandsTotal;

    /**
     * @var int
     *  @Assert\NotBlank(message="veuillez remplir ce champ")
     *  @Assert\Type(type="Integer")
     *  @Assert\LessThanOrEqual(
     *     propertyPath="nbreStandsTotal"
     * )
     * @ORM\Column(name="nbreStandsRest", type="integer")
     */
    private $nbreStandsRest;

    /**
     * @var
     * *@ORM\OneToMany(targetEntity="AppBundle\Entity\Stand",mappedBy="foire")
     */

    private $stands;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ville",inversedBy="foires")
     */
    private $ville;

    /**
     * @var string
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"image/jpg", "image/png", "image/jpeg"},
     *     mimeTypesMessage = "Please upload a valid PNG, JPG or JPEG"
     * )
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

     /* Get id
     *
     * @return int
     */

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserFoire",mappedBy="foire")
     */
    private $userfoires;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Foire
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Foire
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Foire
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Foire
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set nbreStandsTotal
     *
     * @param integer $nbreStandsTotal
     *
     * @return Foire
     */
    public function setNbreStandsTotal($nbreStandsTotal)
    {
        $this->nbreStandsTotal = $nbreStandsTotal;

        return $this;
    }

    /**
     * Get nbreStandsTotal
     *
     * @return int
     */
    public function getNbreStandsTotal()
    {
        return $this->nbreStandsTotal;
    }

    /**
     * Set nbreStandsRest
     *
     * @param integer $nbreStandsRest
     *
     * @return Foire
     */
    public function setNbreStandsRest($nbreStandsRest)
    {
        $this->nbreStandsRest = $nbreStandsRest;

        return $this;
    }

    /**
     * Get nbreStandsRest
     *
     * @return int
     */
    public function getNbreStandsRest()
    {
        return $this->nbreStandsRest;
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
     * @return Foire
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

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return Foire
     */
    public function setVille(\AppBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Add userfoire
     *
     * @param \AppBundle\Entity\UserFoire $userfoire
     *
     * @return Foire
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
     * Set image
     *
     * @param string $image
     *
     * @return Foire
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
