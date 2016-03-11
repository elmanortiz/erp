<?php

namespace ERP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlDepartamentoEmpresa
 *
 * @ORM\Table(name="ctl_departamento_empresa", indexes={@ORM\Index(name="fk_departamento_empresa_sucursal1_idx", columns={"ctl_sucursal_id"})})
 * @ORM\Entity
 */
class CtlDepartamentoEmpresa
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
     * @var string
     *
     * @ORM\Column(name="departamento_empresacol", type="string", length=45, nullable=false)
     */
    private $departamentoEmpresacol;

    /**
     * @var \CtlSucursal
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CtlSucursal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ctl_sucursal_id", referencedColumnName="id")
     * })
     */
    private $ctlSucursal;



    /**
     * Set id
     *
     * @param integer $id
     * @return CtlDepartamentoEmpresa
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
     * Set departamentoEmpresacol
     *
     * @param string $departamentoEmpresacol
     * @return CtlDepartamentoEmpresa
     */
    public function setDepartamentoEmpresacol($departamentoEmpresacol)
    {
        $this->departamentoEmpresacol = $departamentoEmpresacol;

        return $this;
    }

    /**
     * Get departamentoEmpresacol
     *
     * @return string 
     */
    public function getDepartamentoEmpresacol()
    {
        return $this->departamentoEmpresacol;
    }

    /**
     * Set ctlSucursal
     *
     * @param \ERP\AdminBundle\Entity\CtlSucursal $ctlSucursal
     * @return CtlDepartamentoEmpresa
     */
    public function setCtlSucursal(\ERP\AdminBundle\Entity\CtlSucursal $ctlSucursal)
    {
        $this->ctlSucursal = $ctlSucursal;

        return $this;
    }

    /**
     * Get ctlSucursal
     *
     * @return \ERP\AdminBundle\Entity\CtlSucursal 
     */
    public function getCtlSucursal()
    {
        return $this->ctlSucursal;
    }
}
