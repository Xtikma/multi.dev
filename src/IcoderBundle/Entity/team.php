<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\teamRepository")
 */
class team
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
     * Espacio para Relaciones
     */
    
    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="competitor", mappedBy="teams")
     */
    private $competitors;
    
    /**
     * @ORM\OneToMany(targetEntity="inscription", mappedBy="team")
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
     * @return team
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
     * Constructor
     */
    public function __construct()
    {
        $this->competitors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add competitor
     *
     * @param \IcoderBundle\Entity\competitor $competitor
     *
     * @return team
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
     * Add inscription
     *
     * @param \IcoderBundle\Entity\inscription $inscription
     *
     * @return team
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
    
    /**
     * Many teams have One SportTest.
     * @ORM\ManyToOne(targetEntity="SportTest", inversedBy="teams")
     * @ORM\JoinColumn(name="idtest", referencedColumnName="id")
     */
    private $sportTest;

    /**
     * Set sportTest
     *
     * @param \IcoderBundle\Entity\SportTest $sportTest
     *
     * @return team
     */
    public function setSportTest(\IcoderBundle\Entity\SportTest $sportTest = null)
    {
        $this->sportTest = $sportTest;

        return $this;
    }

    /**
     * Get sportTest
     *
     * @return \IcoderBundle\Entity\SportTest
     */
    public function getSportTest()
    {
        return $this->sportTest;
    }
    
    public function __toString() {
        return $this->getName();
    }
}
