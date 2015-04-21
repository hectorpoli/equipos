<?php

namespace Hap\SoporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("nombreProducto",message="Ya se encuentra ese registro en el sistema")
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=150)
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=150)
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    private $modelo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_carga", type="date")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    private $fechaCarga;

    
    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="producto")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    protected $categoria;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     * @return Producto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Producto
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set fechaCarga
     *
     * @param \DateTime $fechaCarga
     * @return Producto
     */
    public function setFechaCarga($fechaCarga)
    {
        $this->fechaCarga = $fechaCarga;

        return $this;
    }

    /**
     * Get fechaCarga
     *
     * @return \DateTime 
     */
    public function getFechaCarga()
    {
        return $this->fechaCarga;
    }

    /**
     * Set categoria
     *
     * @param \Hap\SoporteBundle\Entity\Categoria $categoria
     * @return Producto
     */
    public function setCategoria(\Hap\SoporteBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Hap\SoporteBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
