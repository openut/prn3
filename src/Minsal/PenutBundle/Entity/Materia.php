<?php

namespace Minsal\PenutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table(name="materia", uniqueConstraints={@ORM\UniqueConstraint(name="idx_materia_id", columns={"id"}), @ORM\UniqueConstraint(name="idx_materia_codigo", columns={"codigo_materia"})})
 * @ORM\Entity
 */
class Materia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="materia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_materia", type="string", length=7, nullable=false)
     */
    private $codigoMateria;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_materia", type="string", length=30, nullable=true)
     */
    private $nombreMateria;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidades_valorativas", type="integer", nullable=true)
     */
    private $unidadesValorativas = '4';



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
     * Set codigoMateria
     *
     * @param string $codigoMateria
     * @return Materia
     */
    public function setCodigoMateria($codigoMateria)
    {
        $this->codigoMateria = $codigoMateria;

        return $this;
    }

    /**
     * Get codigoMateria
     *
     * @return string 
     */
    public function getCodigoMateria()
    {
        return $this->codigoMateria;
    }

    /**
     * Set nombreMateria
     *
     * @param string $nombreMateria
     * @return Materia
     */
    public function setNombreMateria($nombreMateria)
    {
        $this->nombreMateria = $nombreMateria;

        return $this;
    }

    /**
     * Get nombreMateria
     *
     * @return string 
     */
    public function getNombreMateria()
    {
        return $this->nombreMateria;
    }

    /**
     * Set unidadesValorativas
     *
     * @param integer $unidadesValorativas
     * @return Materia
     */
    public function setUnidadesValorativas($unidadesValorativas)
    {
        $this->unidadesValorativas = $unidadesValorativas;

        return $this;
    }

    /**
     * Get unidadesValorativas
     *
     * @return integer 
     */
    public function getUnidadesValorativas()
    {
        return $this->unidadesValorativas;
    }
    
    public function __toString() 
    {
        return $this->codigoMateria ? $this->codigoMateria : '';
    }
}
