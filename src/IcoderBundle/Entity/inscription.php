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
}

