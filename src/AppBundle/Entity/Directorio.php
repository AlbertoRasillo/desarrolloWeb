<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Directorio
 *
 * @ORM\Table(name="Directorio", indexes={@ORM\Index(name="fk_Directorio_Directorio1_idx", columns={"parentId"}), @ORM\Index(name="fk_Directorio_EspacioAlmacenamiento1_idx", columns={"EspacioAlmacenamiento_id"})})
 * @ORM\Entity
 */
class Directorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=45, nullable=true)
     */
    private $path;

    /**
     * @var \AppBundle\Entity\Directorio
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Directorio", mappedBy="parent")
     */
    protected $subdirectorios;

    /**
     * @var \AppBundle\Entity\Archivo
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Archivo", mappedBy="directorio")
     */
    protected $archivos;

    /**
     * @var \AppBundle\Entity\Directorio
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Directorio", inversedBy="subdirectorios")
     * @ORM\JoinColumn(name="parentId", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @var \AppBundle\Entity\Espacioalmacenamiento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Espacioalmacenamiento", inversedBy="directorios")
     * @ORM\JoinColumn(name="EspacioAlmacenamiento_id", referencedColumnName="id")
     */
    protected $espacioalmacenamiento;


    public function __construct() {
        $this->subdirectorios = new ArrayCollection();
        $this->archivos = new ArrayCollection();
     }

    /**
     * Set espacioalmacenamiento
     *
     * @param \AppBundle\Entity\Espacioalmacenamiento $espacioalmacenamiento
     * @return Directorio
     */
    public function setEspacioalmacenamiento(\AppBundle\Entity\Espacioalmacenamiento $espacioalmacenamiento)
    {
        $this->espacioalmacenamiento = $espacioalmacenamiento;

        return $this;
    }

    /**
     * Get espacioalmacenamiento
     *
     * @return \AppBundle\Entity\Espacioalmacenamiento 
     */
    public function getEspacioalmacenamiento()
    {
        return $this->espacioalmacenamiento;
    }

    /**
    * Get subdirectorios
    *
    * @return \AppBundle\Entity\Directorio
    */
    public function getSubdirectorios()
    {
        return $this->subdirectorios;
    }

    /**
     * Set idespacioalmacenmiento
     *
     * @param \AppBundle\Entity\Directorio $iddirectorio
     * @return Espacioalmacenamiento
     */
    public function addSubdirectorio(\AppBundle\Entity\Directorio $iddirectorio = null)
    {
        $this->subdirectorios[] = $iddirectorio;
    }

    /**
    * Get archivos
    *
    * @return \AppBundle\Entity\Archivo
    */
    public function getArchivos()
    {
        return $this->archivos;
    }

    /**
     * Set idespacioalmacenmiento
     *
     * @param \AppBundle\Entity\Archivos $archivo
     * @return Directorio
     */
    public function addArchivo(\AppBundle\Entity\Archivo $archivo = null)
    {
        $this->archivos[] = $archivo;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Directorio
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
     * Set path
     *
     * @param string $path
     * @return Directorio
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\Directorio $parent
     * @return Directorio
     */
    public function setParent(\AppBundle\Entity\Directorio $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\Directorio 
     */
    public function getParent()
    {
        return $this->parent;
    }


}
