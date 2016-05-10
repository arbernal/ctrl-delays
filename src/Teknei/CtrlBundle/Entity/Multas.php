<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multas
 *
 * @ORM\Table(name="multas", indexes={@ORM\Index(name="fk_multas_estatus1_idx", columns={"Idestapago"}), @ORM\Index(name="fk_multas_descuento1_idx", columns={"iddescuento"}), @ORM\Index(name="fk_multas_configuracion1_idx", columns={"idconfiguracion"}), @ORM\Index(name="fk_multas_cata1_idx", columns={"idesta"})})
 * @ORM\Entity
 */
class Multas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmultas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmultas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tiem_tran", type="time", nullable=true)
     */
    private $tiemTran;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idesta", referencedColumnName="idcata")
     * })
     */
    private $idesta;

    /**
     * @var \Descuento
     *
     * @ORM\ManyToOne(targetEntity="Descuento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddescuento", referencedColumnName="iddescuento")
     * })
     */
    private $iddescuento;

    /**
     * @var \Configuracion
     *
     * @ORM\ManyToOne(targetEntity="Configuracion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idconfiguracion", referencedColumnName="idconfiguracion")
     * })
     */
    private $idconfiguracion;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Idestapago", referencedColumnName="idcata")
     * })
     */
    private $idestapago;



    /**
     * Get idmultas
     *
     * @return integer
     */
    public function getIdmultas()
    {
        return $this->idmultas;
    }

    /**
     * Set tiemTran
     *
     * @param \DateTime $tiemTran
     *
     * @return Multas
     */
    public function setTiemTran($tiemTran)
    {
        $this->tiemTran = $tiemTran;

        return $this;
    }

    /**
     * Get tiemTran
     *
     * @return \DateTime
     */
    public function getTiemTran()
    {
        return $this->tiemTran;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Multas
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set idesta
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idesta
     *
     * @return Multas
     */
    public function setIdesta(\Teknei\CtrlBundle\Entity\Cata $idesta = null)
    {
        $this->idesta = $idesta;

        return $this;
    }

    /**
     * Get idesta
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdesta()
    {
        return $this->idesta;
    }

    /**
     * Set iddescuento
     *
     * @param \Teknei\CtrlBundle\Entity\Descuento $iddescuento
     *
     * @return Multas
     */
    public function setIddescuento(\Teknei\CtrlBundle\Entity\Descuento $iddescuento = null)
    {
        $this->iddescuento = $iddescuento;

        return $this;
    }

    /**
     * Get iddescuento
     *
     * @return \Teknei\CtrlBundle\Entity\Descuento
     */
    public function getIddescuento()
    {
        return $this->iddescuento;
    }

    /**
     * Set idconfiguracion
     *
     * @param \Teknei\CtrlBundle\Entity\Configuracion $idconfiguracion
     *
     * @return Multas
     */
    public function setIdconfiguracion(\Teknei\CtrlBundle\Entity\Configuracion $idconfiguracion = null)
    {
        $this->idconfiguracion = $idconfiguracion;

        return $this;
    }

    /**
     * Get idconfiguracion
     *
     * @return \Teknei\CtrlBundle\Entity\Configuracion
     */
    public function getIdconfiguracion()
    {
        return $this->idconfiguracion;
    }

    /**
     * Set idestapago
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idestapago
     *
     * @return Multas
     */
    public function setIdestapago(\Teknei\CtrlBundle\Entity\Cata $idestapago = null)
    {
        $this->idestapago = $idestapago;

        return $this;
    }

    /**
     * Get idestapago
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdestapago()
    {
        return $this->idestapago;
    }
}
