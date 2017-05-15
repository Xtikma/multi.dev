<?php

namespace Icoder\JuegosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Deporte
 *
 * @ORM\Table(name="deporte")
 * @ORM\Entity(repositoryClass="Icoder\JuegosBundle\Repository\DeporteRepository")
 */
class Deporte
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new ArrayCollection();
        $this->ediciones  = new ArrayCollection();
    }
    
    /**
     * @ORM\OneToMany(targetEntity="CategoriasDeporte", mappedBy="deporte")
     */
    private $categorias;
    
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
     * @var bool
     *
     * @ORM\Column(name="grupal", type="boolean")
     */
    private $grupal;

    /**
     * @var int
     *
     * @ORM\Column(name="minimo", type="integer")
     */
    private $minimo;

    /**
     * @var int
     *
     * @ORM\Column(name="maximo", type="integer")
     */
    private $maximo;
    


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
     * @return Deporte
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
     * Set grupal
     *
     * @param boolean $grupal
     *
     * @return Deporte
     */
    public function setGrupal($grupal)
    {
        $this->grupal = $grupal;

        return $this;
    }

    /**
     * Get grupal
     *
     * @return bool
     */
    public function getGrupal()
    {
        return $this->grupal;
    }

    /**
     * Set minimo
     *
     * @param integer $minimo
     *
     * @return Deporte
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * Get minimo
     *
     * @return int
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * Set maximo
     *
     * @param integer $maximo
     *
     * @return Deporte
     */
    public function setMaximo($maximo)
    {
        $this->maximo = $maximo;

        return $this;
    }

    /**
     * Get maximo
     *
     * @return int
     */
    public function getMaximo()
    {
        return $this->maximo;
    }
    

    /**
     * Add categoria
     *
     * @param \Icoder\JuegosBundle\Entity\CategoriasDeporte $categoria
     *
     * @return Deporte
     */
    public function addCategoria(\Icoder\JuegosBundle\Entity\CategoriasDeporte $categoria)
    {
        $this->categorias[] = $categoria;

        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \Icoder\JuegosBundle\Entity\CategoriasDeporte $categoria
     */
    public function removeCategoria(\Icoder\JuegosBundle\Entity\CategoriasDeporte $categoria)
    {
        $this->categorias->removeElement($categoria);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
    }
    
    /**
     * Muchos desportes estan en muchas ediciones
     * 
     * @ORM\ManyToMany(targetEntity="EdicionJuegos", mappedBy="deportes")
     */
    private $ediciones;

    /**
     * Add edicione
     *
     * @param \Icoder\JuegosBundle\Entity\EdicionJuegos $edicione
     *
     * @return Deporte
     */
    public function addEdicione(\Icoder\JuegosBundle\Entity\EdicionJuegos $edicione)
    {
        $this->ediciones[] = $edicione;

        return $this;
    }

    /**
     * Remove edicione
     *
     * @param \Icoder\JuegosBundle\Entity\EdicionJuegos $edicione
     */
    public function removeEdicione(\Icoder\JuegosBundle\Entity\EdicionJuegos $edicione)
    {
        $this->ediciones->removeElement($edicione);
    }

    /**
     * Get ediciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEdiciones()
    {
        return $this->ediciones;
    }
    
    public function __toString() {
     return $this->getNombre();   
    }
}
