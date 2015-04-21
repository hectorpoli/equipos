<?php

namespace Hap\SoporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("nombreCategoria",message="Ya se encuentra ese registro en el sistema")
 */
class Categoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_categoria", type="string", length=150)
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="El nombre de la categoria no puede contener números"
     * )
     */
    private $nombreCategoria;

    
    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria")
     */
    protected $producto;

    public function __construct()
    {
        $this->producto = new ArrayCollection();
    }
    
    public function __toString() {
        return $this->nombreCategoria;
    }

    
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
     * Set nombreCategoria
     *
     * @param string $nombreCategoria
     * @return Categoria
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    /**
     * Get nombreCategoria
     *
     * @return string 
     */
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Add producto
     *
     * @param \Hap\SoporteBundle\Entity\Producto $producto
     * @return Categoria
     */
    public function addProducto(\Hap\SoporteBundle\Entity\Producto $producto)
    {
        $this->producto[] = $producto;

        return $this;
    }

    /**
     * Remove producto
     *
     * @param \Hap\SoporteBundle\Entity\Producto $producto
     */
    public function removeProducto(\Hap\SoporteBundle\Entity\Producto $producto)
    {
        $this->producto->removeElement($producto);
    }

    /**
     * Get producto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
