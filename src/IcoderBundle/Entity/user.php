<?php

namespace IcoderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Serializable;

/**
 * user
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="IcoderBundle\Repository\userRepository")
 */
class user implements UserInterface, Serializable {

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
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;
    
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=15)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150)
     */
    private $email;

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
     * @ORM\OneToMany(targetEntity="inscription", mappedBy="user")
     */
    private $inscriptions;

   /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="role", inversedBy="users")
     * @ORM\JoinTable(name="users_role")
     */
    private $roles;

    /**
     * Espacio para Relaciones
     */

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return user
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return user
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return user
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return user
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    function getPlainPassword() {
        return $this->plainPassword;
    }

    function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
    }

    
    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return user
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni() {
        return $this->dni;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return user
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return user
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->inscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add inscription
     *
     * @param \IcoderBundle\Entity\inscription $inscription
     *
     * @return user
     */
    public function addInscription(\IcoderBundle\Entity\inscription $inscription) {
        $this->inscriptions[] = $inscription;

        return $this;
    }

    /**
     * Remove inscription
     *
     * @param \IcoderBundle\Entity\inscription $inscription
     */
    public function removeInscription(\IcoderBundle\Entity\inscription $inscription) {
        $this->inscriptions->removeElement($inscription);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscriptions() {
        return $this->inscriptions;
    }



    public function getSalt() {
        /* Investigar para que es esta variable, no es obligatoria */
        return null;
    }
    
        public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                ) = unserialize($serialized);
    }

    
    public function __toString() {
        return $this->getDni() . " " . $this->getName();
    }

    public function getRoles() {
        return $this->roles;
    }


    /**
     * Add role
     *
     * @param \IcoderBundle\Entity\role $role
     *
     * @return user
     */
    public function addRole(\IcoderBundle\Entity\role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \IcoderBundle\Entity\role $role
     */
    public function removeRole(\IcoderBundle\Entity\role $role)
    {
        $this->roles->removeElement($role);
    }
}
