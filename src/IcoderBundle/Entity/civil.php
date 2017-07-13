<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * civil
 *
 * @ORM\Table(name="civil")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\civilRepository")
 */
class civil
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
     * @ORM\Column(name="dni", type="string", length=20, unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname1", type="string", length=100)
     */
    private $lastname1;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname2", type="string", length=100)
     */
    private $lastname2;


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
     * Set dni
     *
     * @param string $dni
     *
     * @return civil
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return civil
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
     * Set lastname1
     *
     * @param string $lastname1
     *
     * @return civil
     */
    public function setLastname1($lastname1)
    {
        $this->lastname1 = $lastname1;

        return $this;
    }

    /**
     * Get lastname1
     *
     * @return string
     */
    public function getLastname1()
    {
        return $this->lastname1;
    }

    /**
     * Set lastname2
     *
     * @param string $lastname2
     *
     * @return civil
     */
    public function setLastname2($lastname2)
    {
        $this->lastname2 = $lastname2;

        return $this;
    }

    /**
     * Get lastname2
     *
     * @return string
     */
    public function getLastname2()
    {
        return $this->lastname2;
    }
}

