<?php

namespace ERP\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrmHistorialComunicacion
 *
 * @ORM\Table(name="crm_historial_comunicacion", indexes={@ORM\Index(name="fk_historial_comunicacion_detalle_plantilla1_idx", columns={"detalle_plantilla_id"}), @ORM\Index(name="fk_historial_comunicacion_comunicacion1_idx", columns={"comunicacion_id"})})
 * @ORM\Entity
 */
class CrmHistorialComunicacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_detalle", type="string", length=255, nullable=true)
     */
    private $valorDetalle;

    /**
     * @var \CrmComunicacion
     *
     * @ORM\ManyToOne(targetEntity="CrmComunicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comunicacion_id", referencedColumnName="id")
     * })
     */
    private $comunicacion;

    /**
     * @var \CrmDetallePlantilla
     *
     * @ORM\ManyToOne(targetEntity="CrmDetallePlantilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="detalle_plantilla_id", referencedColumnName="id")
     * })
     */
    private $detallePlantilla;



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
     * Set valorDetalle
     *
     * @param string $valorDetalle
     * @return CrmHistorialComunicacion
     */
    public function setValorDetalle($valorDetalle)
    {
        $this->valorDetalle = $valorDetalle;

        return $this;
    }

    /**
     * Get valorDetalle
     *
     * @return string 
     */
    public function getValorDetalle()
    {
        return $this->valorDetalle;
    }

    /**
     * Set comunicacion
     *
     * @param \ERP\CRMBundle\Entity\CrmComunicacion $comunicacion
     * @return CrmHistorialComunicacion
     */
    public function setComunicacion(\ERP\CRMBundle\Entity\CrmComunicacion $comunicacion = null)
    {
        $this->comunicacion = $comunicacion;

        return $this;
    }

    /**
     * Get comunicacion
     *
     * @return \ERP\CRMBundle\Entity\CrmComunicacion 
     */
    public function getComunicacion()
    {
        return $this->comunicacion;
    }

    /**
     * Set detallePlantilla
     *
     * @param \ERP\CRMBundle\Entity\CrmDetallePlantilla $detallePlantilla
     * @return CrmHistorialComunicacion
     */
    public function setDetallePlantilla(\ERP\CRMBundle\Entity\CrmDetallePlantilla $detallePlantilla = null)
    {
        $this->detallePlantilla = $detallePlantilla;

        return $this;
    }

    /**
     * Get detallePlantilla
     *
     * @return \ERP\CRMBundle\Entity\CrmDetallePlantilla 
     */
    public function getDetallePlantilla()
    {
        return $this->detallePlantilla;
    }
}
