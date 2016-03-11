<?php

namespace ERP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlCiudad
 *
 * @ORM\Table(name="ctl_ciudad", indexes={@ORM\Index(name="fk_ctgl_ciudad_ctl_estado1_idx", columns={"ctl_estado_id"})})
 * @ORM\Entity
 */
class CtlCiudad
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
     * @ORM\Column(name="nombre_ciudad", type="string", length=45, nullable=false)
     */
    private $nombreCiudad;

    /**
     * @var \CtlEstado
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CtlEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ctl_estado_id", referencedColumnName="id")
     * })
     */
    private $ctlEstado;



    /**
     * Set id
     *
     * @param integer $id
     * @return CtlCiudad
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
     * Set nombreCiudad
     *
     * @param string $nombreCiudad
     * @return CtlCiudad
     */
    public function setNombreCiudad($nombreCiudad)
    {
        $this->nombreCiudad = $nombreCiudad;

        return $this;
    }

    /**
     * Get nombreCiudad
     *
     * @return string 
     */
    public function getNombreCiudad()
    {
        return $this->nombreCiudad;
    }

    /**
     * Set ctlEstado
     *
     * @param \ERP\AdminBundle\Entity\CtlEstado $ctlEstado
     * @return CtlCiudad
     */
    public function setCtlEstado(\ERP\AdminBundle\Entity\CtlEstado $ctlEstado)
    {
        $this->ctlEstado = $ctlEstado;

        return $this;
    }

    /**
     * Get ctlEstado
     *
     * @return \ERP\AdminBundle\Entity\CtlEstado 
     */
    public function getCtlEstado()
    {
        return $this->ctlEstado;
    }
}
