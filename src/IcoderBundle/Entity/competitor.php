<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * competitor
 *
 * @ORM\Table(name="competitor")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\competitorRepository")
 */
class competitor
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
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=20)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="emil", type="string", length=200)
     */
    private $emil;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal", precision=10, scale=2)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="wight", type="decimal", precision=10, scale=2)
     */
    private $wight;

    /**
     * @var string
     *
     * @ORM\Column(name="blood", type="string", length=4)
     */
    private $blood;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * @return competitor
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
     * @return competitor
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
     * @return competitor
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

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return competitor
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
     * Set emil
     *
     * @param string $emil
     *
     * @return competitor
     */
    public function setEmil($emil)
    {
        $this->emil = $emil;

        return $this;
    }

    /**
     * Get emil
     *
     * @return string
     */
    public function getEmil()
    {
        return $this->emil;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return competitor
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return competitor
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set wight
     *
     * @param string $wight
     *
     * @return competitor
     */
    public function setWight($wight)
    {
        $this->wight = $wight;

        return $this;
    }

    /**
     * Get wight
     *
     * @return string
     */
    public function getWight()
    {
        return $this->wight;
    }

    /**
     * Set blood
     *
     * @param string $blood
     *
     * @return competitor
     */
    public function setBlood($blood)
    {
        $this->blood = $blood;

        return $this;
    }

    /**
     * Get blood
     *
     * @return string
     */
    public function getBlood()
    {
        return $this->blood;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return competitor
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return competitor
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
}

