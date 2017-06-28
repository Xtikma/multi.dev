<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * province
 *
 * @ORM\Table(name="province")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\provinceRepository")
 */
class province
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
    
    /**
     * Espacio para relaciones
     */
    
    /**
     * Realacion para cantones
     * @ORM\OneToMany(targetEntity="canton", mappedBy="province")
     */
    private $cantones;
    
    /**
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
     * @return province
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
     * @return province
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
        $this->cantones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cantone
     *
     * @param \IcoderBundle\Entity\canton $cantone
     *
     * @return province
     */
    public function addCantone(\IcoderBundle\Entity\canton $cantone)
    {
        $this->cantones[] = $cantone;

        return $this;
    }

    /**
     * Remove cantone
     *
     * @param \IcoderBundle\Entity\canton $cantone
     */
    public function removeCantone(\IcoderBundle\Entity\canton $cantone)
    {
        $this->cantones->removeElement($cantone);
    }

    /**
     * Get cantones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCantones()
    {
        return $this->cantones;
    }
    
    public function __toString() {
        return $this->getName();
    }

}
