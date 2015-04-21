<?php

namespace Hap\SoporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inventario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Inventario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_inventario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_carga", type="date")
     */
    private $fechaCarga;
    
    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="inventario")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id_producto")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    protected $producto;


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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Inventario
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaCarga
     *
     * @param \DateTime $fechaCarga
     * @return Inventario
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
     * Set producto
     *
     * @param \Hap\SoporteBundle\Entity\Producto $producto
     * @return Inventario
     */
    public function setProducto(\Hap\SoporteBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Hap\SoporteBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
