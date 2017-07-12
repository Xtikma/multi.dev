<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SportTest
 *
 * @ORM\Table(name="sport_test")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\SportTestRepository")
 */
class SportTest
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
     * @var bool
     *
     * @ORM\Column(name="isFemale", type="boolean")
     */
    private $isFemale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year1", type="date")
     */
    private $year1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year2", type="date")
     */
    private $year2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * @return SportTest
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
     * Set isFemale
     *
     * @param boolean $isFemale
     *
     * @return SportTest
     */
    public function setIsFemale($isFemale)
    {
        $this->isFemale = $isFemale;

        return $this;
    }

    /**
     * Get isFemale
     *
     * @return bool
     */
    public function getIsFemale()
    {
        return $this->isFemale;
    }

    /**
     * Set year1
     *
     * @param \DateTime $year1
     *
     * @return SportTest
     */
    public function setYear1($year1)
    {
        $this->year1 = $year1;

        return $this;
    }

    /**
     * Get year1
     *
     * @return \DateTime
     */
    public function getYear1()
    {
        return $this->year1;
    }

    /**
     * Set year2
     *
     * @param \DateTime $year2
     *
     * @return SportTest
     */
    public function setYear2($year2)
    {
        $this->year2 = $year2;

        return $this;
    }

    /**
     * Get year2
     *
     * @return \DateTime
     */
    public function getYear2()
    {
        return $this->year2;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SportTest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
     /**
     * One SpotTest has Many teams.
     * @ORM\OneToMany(targetEntity="team", mappedBy="sportTest")
     */
    private $teams;
    
    /**
     * Many categorys have One .
     * @ORM\ManyToOne(targetEntity="category", inversedBy="tests")
     * @ORM\JoinColumn(name="idCategory", referencedColumnName="id")
     */
    private $category;
    
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add team
     *
     * @param \IcoderBundle\Entity\team $team
     *
     * @return SportTest
     */
    public function addTeam(\IcoderBundle\Entity\team $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \IcoderBundle\Entity\team $team
     */
    public function removeTeam(\IcoderBundle\Entity\team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Set category
     *
     * @param \IcoderBundle\Entity\category $category
     *
     * @return SportTest
     */
    public function setCategory(\IcoderBundle\Entity\category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \IcoderBundle\Entity\category
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    public function __toString() {
        return $this->getName() . " " . (($this->getCategory())? $this->getCategory() : "");
    }
}
