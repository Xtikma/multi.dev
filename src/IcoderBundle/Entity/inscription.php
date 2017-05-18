<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\inscriptionRepository")
 */
class inscription
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
     * @var \DateTime
     *
     * @ORM\Column(name="register", type="date")
     */
    private $register;
    
    /**
     * Espacio para Relaciones
     */
    
    /**
     * @ORM\ManyToOne(targetEntity="team", inversedBy="inscriptions")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;
    
     /**
     * @ORM\ManyToOne(targetEntity="edition", inversedBy="inscriptions")
     * @ORM\JoinColumn(name="edition_id", referencedColumnName="id")
     */
    private $edition;
    
    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="inscriptions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
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
     * Set register
     *
     * @param \DateTime $register
     *
     * @return inscription
     */
    public function setRegister($register)
    {
        $this->register = $register;

        return $this;
    }

    /**
     * Get register
     *
     * @return \DateTime
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * Set team
     *
     * @param \IcoderBundle\Entity\team $team
     *
     * @return inscription
     */
    public function setTeam(\IcoderBundle\Entity\team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \IcoderBundle\Entity\team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set edition
     *
     * @param \IcoderBundle\Entity\edition $edition
     *
     * @return inscription
     */
    public function setEdition(\IcoderBundle\Entity\edition $edition = null)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return \IcoderBundle\Entity\edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set user
     *
     * @param \IcoderBundle\Entity\user $user
     *
     * @return inscription
     */
    public function setUser(\IcoderBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \IcoderBundle\Entity\user
     */
    public function getUser()
    {
        return $this->user;
    }
}
