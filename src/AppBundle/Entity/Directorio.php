<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Directorio
 *
 * @ORM\Table(name="Directorio", indexes={@ORM\Index(name="fk_Directorio_Directorio1_idx", columns={"parentId"})})
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Directorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentId", referencedColumnName="id")
     * })
     */
    private $parentid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Espacioalmacenamiento", mappedBy="iddirectorio")
     */
    private $idespacioalmacenamientohasdirectorio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idespacioalmacenamientohasdirectorio = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set parentid
     *
     * @param \AppBundle\Entity\Directorio $parentid
     * @return Directorio
     */
    public function setParentid(\AppBundle\Entity\Directorio $parentid = null)
    {
        $this->parentid = $parentid;

        return $this;
    }

    /**
     * Get parentid
     *
     * @return \AppBundle\Entity\Directorio 
     */
    public function getParentid()
    {
        return $this->parentid;
    }

    /**
     * Add idespacioalmacenamientohasdirectorio
     *
     * @param \AppBundle\Entity\Espacioalmacenamiento $idespacioalmacenamientohasdirectorio
     * @return Directorio
     */
    public function addIdespacioalmacenamientohasdirectorio(\AppBundle\Entity\Espacioalmacenamiento $idespacioalmacenamientohasdirectorio)
    {
        $this->idespacioalmacenamientohasdirectorio[] = $idespacioalmacenamientohasdirectorio;

        return $this;
    }

    /**
     * Remove idespacioalmacenamientohasdirectorio
     *
     * @param \AppBundle\Entity\Espacioalmacenamiento $idespacioalmacenamientohasdirectorio
     */
    public function removeIdespacioalmacenamientohasdirectorio(\AppBundle\Entity\Espacioalmacenamiento $idespacioalmacenamientohasdirectorio)
    {
        $this->idespacioalmacenamientohasdirectorio->removeElement($idespacioalmacenamientohasdirectorio);
    }

    /**
     * Get idespacioalmacenamientohasdirectorio
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdespacioalmacenamientohasdirectorio()
    {
        return $this->idespacioalmacenamientohasdirectorio;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
