<?php

namespace Minsal\PenutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno", uniqueConstraints={@ORM\UniqueConstraint(name="idx_alumno_id", columns={"id"}), @ORM\UniqueConstraint(name="idx_alumno_carnet", columns={"carnet"})})
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="alumno_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="carnet", type="string", length=7, nullable=false)
     */
    private $carnet;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_alumno", type="string", length=30, nullable=false)
     */
    private $nombreAlumno;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_alumno", type="string", length=30, nullable=true)
     */
    private $apellidoAlumno;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad_alumno", type="integer", nullable=true)
     */
    private $edadAlumno;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo_alumno", type="string", length=1, nullable=true)
     */
    private $sexoAlumno;



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
     * Set carnet
     *
     * @param string $carnet
     * @return Alumno
     */
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

        return $this;
    }

    /**
     * Get carnet
     *
     * @return string 
     */
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Set nombreAlumno
     *
     * @param string $nombreAlumno
     * @return Alumno
     */
    public function setNombreAlumno($nombreAlumno)
    {
        $this->nombreAlumno = $nombreAlumno;

        return $this;
    }

    /**
     * Get nombreAlumno
     *
     * @return string 
     */
    public function getNombreAlumno()
    {
        return $this->nombreAlumno;
    }

    /**
     * Set apellidoAlumno
     *
     * @param string $apellidoAlumno
     * @return Alumno
     */
    public function setApellidoAlumno($apellidoAlumno)
    {
        $this->apellidoAlumno = $apellidoAlumno;

        return $this;
    }

    /**
     * Get apellidoAlumno
     *
     * @return string 
     */
    public function getApellidoAlumno()
    {
        return $this->apellidoAlumno;
    }

    /**
     * Set edadAlumno
     *
     * @param integer $edadAlumno
     * @return Alumno
     */
    public function setEdadAlumno($edadAlumno)
    {
        $this->edadAlumno = $edadAlumno;

        return $this;
    }

    /**
     * Get edadAlumno
     *
     * @return integer 
     */
    public function getEdadAlumno()
    {
        return $this->edadAlumno;
    }

    /**
     * Set sexoAlumno
     *
     * @param string $sexoAlumno
     * @return Alumno
     */
    public function setSexoAlumno($sexoAlumno)
    {
        $this->sexoAlumno = $sexoAlumno;

        return $this;
    }

    /**
     * Get sexoAlumno
     *
     * @return string 
     */
    public function getSexoAlumno()
    {
        return $this->sexoAlumno;
    }
    
    public function __toString() 
    {
        return $this->carnet ? $this->carnet : '';
    }
}
