<?php

namespace Minsal\PenutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota", uniqueConstraints={@ORM\UniqueConstraint(name="idx_nota_id", columns={"id"}), @ORM\UniqueConstraint(name="idx_nota_ccc", columns={"id_alumno", "id_materia", "ciclo"})}, indexes={@ORM\Index(name="IDX_C8D03E0D320260C0", columns={"id_alumno"}), @ORM\Index(name="IDX_C8D03E0DB36DFBF4", columns={"id_materia"})})
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="nota_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=6, nullable=false)
     */
    private $ciclo;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_final", type="float", precision=10, scale=0, nullable=true)
     */
    private $notaFinal;

    /**
     * @var \Alumno
     *
     * @ORM\ManyToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_alumno", referencedColumnName="id")
     * })
     */
    private $idAlumno;

    /**
     * @var \Materia
     *
     * @ORM\ManyToOne(targetEntity="Materia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_materia", referencedColumnName="id")
     * })
     */
    private $idMateria;



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
     * Set ciclo
     *
     * @param string $ciclo
     * @return Nota
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string 
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * Set notaFinal
     *
     * @param float $notaFinal
     * @return Nota
     */
    public function setNotaFinal($notaFinal)
    {
        $this->notaFinal = $notaFinal;

        return $this;
    }

    /**
     * Get notaFinal
     *
     * @return float 
     */
    public function getNotaFinal()
    {
        return $this->notaFinal;
    }

    /**
     * Set idAlumno
     *
     * @param \Minsal\PenutBundle\Entity\Alumno $idAlumno
     * @return Nota
     */
    public function setIdAlumno(\Minsal\PenutBundle\Entity\Alumno $idAlumno = null)
    {
        $this->idAlumno = $idAlumno;

        return $this;
    }

    /**
     * Get idAlumno
     *
     * @return \Minsal\PenutBundle\Entity\Alumno 
     */
    public function getIdAlumno()
    {
        return $this->idAlumno;
    }

    /**
     * Set idMateria
     *
     * @param \Minsal\PenutBundle\Entity\Materia $idMateria
     * @return Nota
     */
    public function setIdMateria(\Minsal\PenutBundle\Entity\Materia $idMateria = null)
    {
        $this->idMateria = $idMateria;

        return $this;
    }

    /**
     * Get idMateria
     *
     * @return \Minsal\PenutBundle\Entity\Materia 
     */
    public function getIdMateria()
    {
        return $this->idMateria;
    }
}
