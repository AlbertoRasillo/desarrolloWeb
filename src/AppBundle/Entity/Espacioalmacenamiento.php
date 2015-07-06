<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLogin", referencedColumnName="id")
     * })
     */
    private $idlogin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Directorio", inversedBy="idespacioalmacenamientohasdirectorio")
     * @ORM\JoinTable(name="espacioalmacenamientohasdirectorio",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idEspacioAlmacenamientoHasDirectorio", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idDirectorio", referencedColumnName="id")
     *   }
     * )
     */
    private $iddirectorio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iddirectorio = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idlogin
     *
     * @param \AppBundle\Entity\Usuario $idlogin
     * @return Espacioalmacenamiento
     */
    public function setIdlogin(\AppBundle\Entity\Usuario $idlogin = null)
    {
        $this->idlogin = $idlogin;

        return $this;
    }

    /**
     * Get idlogin
     *
     * @return \AppBundle\Entity\Usuario 
     */
    public function getIdlogin()
    {
        return $this->idlogin;
    }

    /**
     * Add iddirectorio
     *
     * @param \AppBundle\Entity\Directorio $iddirectorio
     * @return Espacioalmacenamiento
     */
    public function addIddirectorio(\AppBundle\Entity\Directorio $iddirectorio)
    {
        $this->iddirectorio[] = $iddirectorio;

        return $this;
    }

    /**
     * Remove iddirectorio
     *
     * @param \AppBundle\Entity\Directorio $iddirectorio
     */
    public function removeIddirectorio(\AppBundle\Entity\Directorio $iddirectorio)
    {
        $this->iddirectorio->removeElement($iddirectorio);
    }

    /**
     * Get iddirectorio
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIddirectorio()
    {
        return $this->iddirectorio;
    }
}
