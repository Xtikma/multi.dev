<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\roleRepository")
 */
class role
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
     * @ORM\Column(name="role", type="string", length=50)
     */
    private $role;

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
     * @ORM\ManyToOne(targetEntity="user", inversedBy="roles")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $user;
    
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
     * Set role
     *
     * @param string $role
     *
     * @return role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return role
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
     * Set user
     *
     * @param \IcoderBundle\Entity\user $user
     *
     * @return role
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
