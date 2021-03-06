<?php

namespace Hap\SoporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hap\SoporteBundle\Entity\ProductoRepository")
 * 
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    private $descripcion;

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
     * @ORM\OneToMany(targetEntity="Inventario", mappedBy="producto")
     */
    protected $inventario;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     * 
     */
    private $id_usuario;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario_modificacion", type="integer")
     * 
     */
    private $id_usuario_modificacion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=50)
     */
    private $serial;
    
    /**
     * Indica como esta la maquina
     * 1 = Funcional
     * 2 = Dañada
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;
    
    /**
     * Sirve para identificar si esta disponible o no
     * 1 = No disponible
     * 2 = Disponible
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer")
     */
    private $estatus;
    
    /**
     * Indica si el producto esta habilitado para prestamo o no
     * @var boolean
     *
     * @ORM\Column(name="habilitado", type="boolean")
     */
    private $habilitado;
    
    
    
    public function __construct()
    {
        $this->inventario = new ArrayCollection();
        $this->estatus = 2;
        $this->estado=1;
        $this->habilitado=1;
    }
    
    public function __toString() {
        return $this->nombreProducto . '-' . $this->modelo;
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

    /**
     * Add inventario
     *
     * @param \Hap\SoporteBundle\Entity\Inventario $inventario
     * @return Producto
     */
    public function addInventario(\Hap\SoporteBundle\Entity\Inventario $inventario)
    {
        $this->inventario[] = $inventario;

        return $this;
    }

    /**
     * Remove inventario
     *
     * @param \Hap\SoporteBundle\Entity\Inventario $inventario
     */
    public function removeInventario(\Hap\SoporteBundle\Entity\Inventario $inventario)
    {
        $this->inventario->removeElement($inventario);
    }

    /**
     * Get inventario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInventario()
    {
        return $this->inventario;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set id_usuario
     *
     * @param integer $idUsuario
     * @return Producto
     */
    public function setIdUsuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;

        return $this;
    }

    /**
     * Get id_usuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set id_usuario_modificacion
     *
     * @param integer $idUsuarioModificacion
     * @return Producto
     */
    public function setIdUsuarioModificacion($idUsuarioModificacion)
    {
        $this->id_usuario_modificacion = $idUsuarioModificacion;

        return $this;
    }

    /**
     * Get id_usuario_modificacion
     *
     * @return integer 
     */
    public function getIdUsuarioModificacion()
    {
        return $this->id_usuario_modificacion;
    }

    
    /**
     * Set estado
     *
     * @param integer $estado
     * @return Producto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return Producto
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }


    /**
     * Set estatus
     *
     * @param integer $estatus
     * @return Producto
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return integer 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set habilitado
     *
     * @param boolean $habilitado
     * @return Producto
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return boolean 
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }
}
