<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * edition
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\editionRepository")
 */
class edition
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
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="pace", type="string", length=255)
     */
    private $pace;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="date")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date")
     */
    private $end;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * Espacio para Relaciones
     */
    
    /**
     * @ORM\OneToMany(targetEntity="inscription", mappedBy="edition")
     */
    private $inscriptions;
    /**
     * Espacio para Relaciones
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
     * @return edition
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
     * Set year
     *
     * @param \DateTime $year
     *
     * @return edition
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set pace
     *
     * @param string $pace
     *
     * @return edition
     */
    public function setPace($pace)
    {
        $this->pace = $pace;

        return $this;
    }

    /**
     * Get pace
     *
     * @return string
     */
    public function getPace()
    {
        return $this->pace;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return edition
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return edition
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return edition
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
        $this->inscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add inscription
     *
     * @param \IcoderBundle\Entity\inscription $inscription
     *
     * @return edition
     */
    public function addInscription(\IcoderBundle\Entity\inscription $inscription)
    {
        $this->inscriptions[] = $inscription;

        return $this;
    }

    /**
     * Remove inscription
     *
     * @param \IcoderBundle\Entity\inscription $inscription
     */
    public function removeInscription(\IcoderBundle\Entity\inscription $inscription)
    {
        $this->inscriptions->removeElement($inscription);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }
    
    public function __toString() {
        return $this->getName() . " " .$this->getYear()->format('Y');
    }
}
