<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Espacioalmacenamiento
 *
 * @ORM\Table(name="EspacioAlmacenamiento", indexes={@ORM\Index(name="fk_EspacioAlmacenamiento_Login_idx", columns={"idLogin"})})
 * @ORM\Entity
 */
class Espacioalmacenamiento
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
     * @ORM\Column(name="raiz", type="string", length=45, nullable=true)
     */
    private $raiz;

    /**
     * @var float
     *
     * @ORM\Column(name="cuota", type="float", precision=10, scale=0, nullable=true)
     */
    private $cuota;

    /**
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Usuario", inversedBy="espacio")
     * @ORM\JoinColumn(name="idLogin", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var \AppBundle\Entity\Directorio
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Directorio", mappedBy="espacioalmacenamiento")
     */
    protected $directorios;


    public function __construct() {
        $this->directorios = new ArrayCollection();
    }

    /**
     * Get directorio
     *
     * @return \AppBundle\Entity\Directorio 
     */
    public function getDirectorios()
    {
        return $this->directorios;
    }

    /**
     * Set idespacioalmacenmiento
     *
     * @param \AppBundle\Entity\Directorio $directorio
     * @return Espacioalmacenamiento
     */
    public function addDirectorio(\AppBundle\Entity\Directorio $directorio)
    {
        $this->directorios[] = $directorio;

        return $this;
    }


    /**
    * Get root
    *
    * @return \AppBundle\Entity\Directorio 
    *
    */
    public function getRootDir() {
        foreach($this->getDirectorios() as $subdir) {
            if( $subdir->getPath()=='/' )
                return $subdir;
        }
        return null;
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
     * @return Espacioalmacenamiento
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
     * Set raiz
     *
     * @param string $raiz
     * @return Espacioalmacenamiento
     */
    public function setRaiz($raiz)
    {
        $this->raiz = $raiz;

        return $this;
    }

    /**
     * Get raiz
     *
     * @return string 
     */
    public function getRaiz()
    {
        return $this->raiz;
    }

    /**
     * Set cuota
     *
     * @param float $cuota
     * @return Espacioalmacenamiento
     */
    public function setCuota($cuota)
    {
        $this->cuota = $cuota;

        return $this;
    }

    /**
     * Get cuota
     *
     * @return float 
     */
    public function getCuota()
    {
        return $this->cuota;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Usuario $user
     * @return Espacioalmacenamiento
     */
    public function setUser(\AppBundle\Entity\Usuario $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Usuario 
     */
    public function getUser()
    {
        return $this->user;
    }
}
