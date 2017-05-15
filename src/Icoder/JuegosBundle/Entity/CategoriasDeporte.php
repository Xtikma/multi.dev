<?php

namespace Icoder\JuegosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriasDeporte
 *
 * @ORM\Table(name="categorias_deporte")
 * @ORM\Entity(repositoryClass="Icoder\JuegosBundle\Repository\CategoriasDeporteRepository")
 */
class CategoriasDeporte
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
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;
    
    /**
     * @ORM\ManyToOne(targetEntity="Deporte", inversedBy="categorias")
     * @ORM\JoinColumn(name="id_deporte", referencedColumnName="id")
     */
    private $deporte;

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
     * @return CategoriasDeporte
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
     * Set edad
     *
     * @param integer $edad
     *
     * @return CategoriasDeporte
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set deporte
     *
     * @param \Icoder\JuegosBundle\Entity\Deporte $deporte
     *
     * @return CategoriasDeporte
     */
    public function setDeporte(\Icoder\JuegosBundle\Entity\Deporte $deporte = null)
    {
        $this->deporte = $deporte;

        return $this;
    }

    /**
     * Get deporte
     *
     * @return \Icoder\JuegosBundle\Entity\Deporte
     */
    public function getDeporte()
    {
        return $this->deporte;
    }
    
    public function __toString() {
        return $this->nombre . " " . $this->edad ;
    }
}
