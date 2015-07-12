<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Archivo
 *
 * @ORM\Table(name="Archivo", indexes={@ORM\Index(name="fk_Archivo_Directorio1_idx", columns={"idDirectorio"})})
 * @ORM\Entity
 */
class Archivo
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
     * @ORM\Column(name="tipo", type="string", length=45, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=45, nullable=true)
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="mimeType", type="string", length=45, nullable=true)
     */
    private $mimetype;

    /**
     * @var float
     *
     * @ORM\Column(name="tamano", type="float", precision=10, scale=0, nullable=true)
     */
    private $tamano;

    /**
     * @var \AppBundle\Entity\Directorio
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Directorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDirectorio", referencedColumnName="id")
     * })
     */
    private $iddirectorio;



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
     * @return Archivo
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
     * Set tipo
     *
     * @param string $tipo
     * @return Archivo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set hash
     *
     * @param string $hash
     * @return Archivo
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set mimetype
     *
     * @param string $mimetype
     * @return Archivo
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string 
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set tamano
     *
     * @param float $tamano
     * @return Archivo
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano
     *
     * @return float 
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set iddirectorio
     *
     * @param \AppBundle\Entity\Directorio $iddirectorio
     * @return Archivo
     */
    public function setIddirectorio(\AppBundle\Entity\Directorio $iddirectorio = null)
    {
        $this->iddirectorio = $iddirectorio;

        return $this;
    }

    /**
     * Get iddirectorio
     *
     * @return \AppBundle\Entity\Directorio 
     */
    public function getIddirectorio()
    {
        return $this->iddirectorio;
    }

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

}
