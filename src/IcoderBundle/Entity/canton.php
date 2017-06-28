<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * canton
 *
 * @ORM\Table(name="canton")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\cantonRepository")
 */
class canton
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /***
     * Espacio para relaciones
     */
    
    /**
     * Relacion para competidores
     * 
     * @ORM\OneToMany(targetEntity="competitor", mappedBy="canton")
     */
    private $competitors;
    
    
    /**
     * Relacion para province
     * 
     * @ORM\ManyToOne(targetEntity="province", inversedBy="cantones")
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
     */
    private $province;
    
    
    /***
     * Espacio para relaciones
     */


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
     * Set name
     *
     * @param string $name
     *
     * @return canton
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return canton
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competitors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add competitor
     *
     * @param \IcoderBundle\Entity\competitor $competitor
     *
     * @return canton
     */
    public function addCompetitor(\IcoderBundle\Entity\competitor $competitor)
    {
        $this->competitors[] = $competitor;

        return $this;
    }

    /**
     * Remove competitor
     *
     * @param \IcoderBundle\Entity\competitor $competitor
     */
    public function removeCompetitor(\IcoderBundle\Entity\competitor $competitor)
    {
        $this->competitors->removeElement($competitor);
    }

    /**
     * Get competitors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetitors()
    {
        return $this->competitors;
    }

    /**
     * Set province
     *
     * @param \IcoderBundle\Entity\province $province
     *
     * @return canton
     */
    public function setProvince(\IcoderBundle\Entity\province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \IcoderBundle\Entity\province
     */
    public function getProvince()
    {
        return $this->province;
    }
    
    public function __toString() {
        return $this->getName();
    }

}
