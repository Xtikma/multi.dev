<?php

namespace Icoder\JuegosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * EdicionJuegos
 *
 * @ORM\Table(name="edicion_juegos")
 * @ORM\Entity(repositoryClass="Icoder\JuegosBundle\Repository\EdicionJuegosRepository")
 */
class EdicionJuegos
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="date")
     */
    private $ciclo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_inicio", type="date")
     */
    private $fInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_fin", type="date")
     */
    private $fFin;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EdicionJuegos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ciclo
     *
     * @param string $ciclo
     *
     * @return EdicionJuegos
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * Set fInicio
     *
     * @param \DateTime $fInicio
     *
     * @return EdicionJuegos
     */
    public function setFInicio($fInicio)
    {
        $this->fInicio = $fInicio;

        return $this;
    }

    /**
     * Get fInicio
     *
     * @return \DateTime
     */
    public function getFInicio()
    {
        return $this->fInicio;
    }

    /**
     * Set fFin
     *
     * @param \DateTime $fFin
     *
     * @return EdicionJuegos
     */
    public function setFFin($fFin)
    {
        $this->fFin = $fFin;

        return $this;
    }

    /**
     * Get fFin
     *
     * @return \DateTime
     */
    public function getFFin()
    {
        return $this->fFin;
    }
    
    /**
     * muchos deportes estan en una edicion
     * 
     * @ORM\ManyToMany(targetEntity="Deporte", inversedBy="ediciones")
     * @ORM\JoinTable(name="edicion_deporte")
     */
    private $deportes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deportes = new ArrayCollection();
    }

    /**
     * Add deporte
     *
     * @param \Icoder\JuegosBundle\Entity\Deporte $deporte
     *
     * @return EdicionJuegos
     */
    public function addDeporte(\Icoder\JuegosBundle\Entity\Deporte $deporte)
    {
        $this->deportes[] = $deporte;

        return $this;
    }

    /**
     * Remove deporte
     *
     * @param \Icoder\JuegosBundle\Entity\Deporte $deporte
     */
    public function removeDeporte(\Icoder\JuegosBundle\Entity\Deporte $deporte)
    {
        $this->deportes->removeElement($deporte);
    }

    /**
     * Get deportes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeportes()
    {
        return $this->deportes;
    }
    
    public function __toString() {
        return $this->getNombre() . " " . $this->getCiclo()->format('Y');
    }
}
