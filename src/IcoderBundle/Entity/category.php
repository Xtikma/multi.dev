<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\categoryRepository")
 */
class category
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
     * @var int
     *
     * @ORM\Column(name="quota", type="integer")
     */
    private $quota;

    /**
     * @var bool
     *
     * @ORM\Column(name="isTeam", type="boolean")
     */
    private $isTeam;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * Espacio para Relaciones
     */
    
    /**
     * @ORM\ManyToOne(targetEntity="sport", inversedBy="categories")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id")
     */
    private $sport;

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
     * @return category
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
     * Set quota
     *
     * @param integer $quota
     *
     * @return category
     */
    public function setQuota($quota)
    {
        $this->quota = $quota;

        return $this;
    }

    /**
     * Get quota
     *
     * @return int
     */
    public function getQuota()
    {
        return $this->quota;
    }

    /**
     * Set isTeam
     *
     * @param boolean $isTeam
     *
     * @return category
     */
    public function setIsTeam($isTeam)
    {
        $this->isTeam = $isTeam;

        return $this;
    }

    /**
     * Get isTeam
     *
     * @return bool
     */
    public function getIsTeam()
    {
        return $this->isTeam;
    }

    /**
     * Set active
     *
     *@param boolean $active
     *
     * @return category
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
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sport
     *
     * @param \IcoderBundle\Entity\sport $sport
     *
     * @return category
     */
    public function setSport(\IcoderBundle\Entity\sport $sport = null)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return \IcoderBundle\Entity\sport
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Add team
     *
     * @param \IcoderBundle\Entity\team $team
     *
     * @return category
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
     * One category has Many SportTest.
     * @ORM\OneToMany(targetEntity="SportTest", mappedBy="category")
     */
    private $tests;

    /**
     * Add test
     *
     * @param \IcoderBundle\Entity\SportTest $test
     *
     * @return category
     */
    public function addTest(\IcoderBundle\Entity\SportTest $test)
    {
        $this->tests[] = $test;

        return $this;
    }

    /**
     * Remove test
     *
     * @param \IcoderBundle\Entity\SportTest $test
     */
    public function removeTest(\IcoderBundle\Entity\SportTest $test)
    {
        $this->tests->removeElement($test);
    }

    /**
     * Get tests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTests()
    {
        return $this->tests;
    }
}
