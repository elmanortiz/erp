<?php

namespace ERP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstado
 *
 * @ORM\Table(name="ctl_estado", indexes={@ORM\Index(name="fk_ctl_estado_ctl_pais1_idx", columns={"ctl_pais_id"})})
 * @ORM\Entity
 */
class CtlEstado
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
     * @ORM\Column(name="nombre_estado", type="string", length=45, nullable=false)
     */
    private $nombreEstado;

    /**
     * @var \CtlPais
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CtlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ctl_pais_id", referencedColumnName="id")
     * })
     */
    private $ctlPais;



    /**
     * Set id
     *
     * @param integer $id
     * @return CtlEstado
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
     * Set nombreEstado
     *
     * @param string $nombreEstado
     * @return CtlEstado
     */
    public function setNombreEstado($nombreEstado)
    {
        $this->nombreEstado = $nombreEstado;

        return $this;
    }

    /**
     * Get nombreEstado
     *
     * @return string 
     */
    public function getNombreEstado()
    {
        return $this->nombreEstado;
    }

    /**
     * Set ctlPais
     *
     * @param \ERP\AdminBundle\Entity\CtlPais $ctlPais
     * @return CtlEstado
     */
    public function setCtlPais(\ERP\AdminBundle\Entity\CtlPais $ctlPais)
    {
        $this->ctlPais = $ctlPais;

        return $this;
    }

    /**
     * Get ctlPais
     *
     * @return \ERP\AdminBundle\Entity\CtlPais 
     */
    public function getCtlPais()
    {
        return $this->ctlPais;
    }
}
