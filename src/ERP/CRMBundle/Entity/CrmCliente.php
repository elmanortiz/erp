<?php

namespace ERP\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrmCliente
 *
 * @ORM\Table(name="crm_cliente", indexes={@ORM\Index(name="fk_cliente_categoria_cliente1_idx", columns={"categoria_cliente_id"}), @ORM\Index(name="fk_cliente_territorio1_idx", columns={"territorio_id"}), @ORM\Index(name="fk_cliente_cliente_potencial1_idx", columns={"cliente_potencial_id"})})
 * @ORM\Entity
 */
class CrmCliente
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
     * @ORM\Column(name="tipo", type="string", length=50, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="datos_cliente", type="string", length=255, nullable=true)
     */
    private $datosCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="sitio_web", type="string", length=255, nullable=true)
     */
    private $sitioWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=255, nullable=true)
     */
    private $nombreCompleto;

    /**
     * @var \CtlCategoriaCliente
     *
     * @ORM\ManyToOne(targetEntity="CtlCategoriaCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_cliente_id", referencedColumnName="id")
     * })
     */
    private $categoriaCliente;

    /**
     * @var \CrmClientePotencial
     *
     * @ORM\ManyToOne(targetEntity="CrmClientePotencial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_potencial_id", referencedColumnName="id")
     * })
     */
    private $clientePotencial;

    /**
     * @var \CtlTerritorio
     *
     * @ORM\ManyToOne(targetEntity="CtlTerritorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="territorio_id", referencedColumnName="id")
     * })
     */
    private $territorio;



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
     * Set tipo
     *
     * @param string $tipo
     * @return CrmCliente
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
     * Set datosCliente
     *
     * @param string $datosCliente
     * @return CrmCliente
     */
    public function setDatosCliente($datosCliente)
    {
        $this->datosCliente = $datosCliente;

        return $this;
    }

    /**
     * Get datosCliente
     *
     * @return string 
     */
    public function getDatosCliente()
    {
        return $this->datosCliente;
    }

    /**
     * Set sitioWeb
     *
     * @param string $sitioWeb
     * @return CrmCliente
     */
    public function setSitioWeb($sitioWeb)
    {
        $this->sitioWeb = $sitioWeb;

        return $this;
    }

    /**
     * Get sitioWeb
     *
     * @return string 
     */
    public function getSitioWeb()
    {
        return $this->sitioWeb;
    }

    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     * @return CrmCliente
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set categoriaCliente
     *
     * @param \ERP\CRMBundle\Entity\CtlCategoriaCliente $categoriaCliente
     * @return CrmCliente
     */
    public function setCategoriaCliente(\ERP\CRMBundle\Entity\CtlCategoriaCliente $categoriaCliente = null)
    {
        $this->categoriaCliente = $categoriaCliente;

        return $this;
    }

    /**
     * Get categoriaCliente
     *
     * @return \ERP\CRMBundle\Entity\CtlCategoriaCliente 
     */
    public function getCategoriaCliente()
    {
        return $this->categoriaCliente;
    }

    /**
     * Set clientePotencial
     *
     * @param \ERP\CRMBundle\Entity\CrmClientePotencial $clientePotencial
     * @return CrmCliente
     */
    public function setClientePotencial(\ERP\CRMBundle\Entity\CrmClientePotencial $clientePotencial = null)
    {
        $this->clientePotencial = $clientePotencial;

        return $this;
    }

    /**
     * Get clientePotencial
     *
     * @return \ERP\CRMBundle\Entity\CrmClientePotencial 
     */
    public function getClientePotencial()
    {
        return $this->clientePotencial;
    }

    /**
     * Set territorio
     *
     * @param \ERP\CRMBundle\Entity\CtlTerritorio $territorio
     * @return CrmCliente
     */
    public function setTerritorio(\ERP\CRMBundle\Entity\CtlTerritorio $territorio = null)
    {
        $this->territorio = $territorio;

        return $this;
    }

    /**
     * Get territorio
     *
     * @return \ERP\CRMBundle\Entity\CtlTerritorio 
     */
    public function getTerritorio()
    {
        return $this->territorio;
    }
}
