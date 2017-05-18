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
}

