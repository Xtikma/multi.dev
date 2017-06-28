<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\typeRepository")
 */
class type
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    
    /**
     * espacio para relaciones
     */
    
    /**
     * Relacion para competidores
     * 
     * @ORM\OneToMany(targetEntity="competitor", mappedBy="type")
     */
    private $competitors;
    
    /**
     * espacio para relaciones
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
     * @return type
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
     * @return type
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
     * @return type
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
    
    public function __toString() {
        return $this->getName();
    }
}
