<?php

namespace ERP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhSalario
 *
 * @ORM\Table(name="rh_salario", indexes={@ORM\Index(name="fk_rh_salario_rh_tipo_ingreso1_idx", columns={"rh_tipo_ingreso_id"}), @ORM\Index(name="fk_rh_salario_rh_estructura_salarios1_idx", columns={"rh_estructura_salarios_id"})})
 * @ORM\Entity
 */
class RhSalario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var \RhTipoIngreso
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="RhTipoIngreso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rh_tipo_ingreso_id", referencedColumnName="id")
     * })
     */
    private $rhTipoIngreso;

    /**
     * @var \RhEstructuraSalarios
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="RhEstructuraSalarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rh_estructura_salarios_id", referencedColumnName="id")
     * })
     */
    private $rhEstructuraSalarios;



    /**
     * Set id
     *
     * @param integer $id
     * @return RhSalario
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set importe
     *
     * @param float $importe
     * @return RhSalario
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set rhTipoIngreso
     *
     * @param \ERP\AdminBundle\Entity\RhTipoIngreso $rhTipoIngreso
     * @return RhSalario
     */
    public function setRhTipoIngreso(\ERP\AdminBundle\Entity\RhTipoIngreso $rhTipoIngreso)
    {
        $this->rhTipoIngreso = $rhTipoIngreso;

        return $this;
    }

    /**
     * Get rhTipoIngreso
     *
     * @return \ERP\AdminBundle\Entity\RhTipoIngreso 
     */
    public function getRhTipoIngreso()
    {
        return $this->rhTipoIngreso;
    }

    /**
     * Set rhEstructuraSalarios
     *
     * @param \ERP\AdminBundle\Entity\RhEstructuraSalarios $rhEstructuraSalarios
     * @return RhSalario
     */
    public function setRhEstructuraSalarios(\ERP\AdminBundle\Entity\RhEstructuraSalarios $rhEstructuraSalarios)
    {
        $this->rhEstructuraSalarios = $rhEstructuraSalarios;

        return $this;
    }

    /**
     * Get rhEstructuraSalarios
     *
     * @return \ERP\AdminBundle\Entity\RhEstructuraSalarios 
     */
    public function getRhEstructuraSalarios()
    {
        return $this->rhEstructuraSalarios;
    }
}
