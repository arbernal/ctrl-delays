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
     * @var integer
     *
     * @ORM\Column(name="Idestapago", type="integer", nullable=false)
     */
    private $idestapago;

    /**
     * @var integer
     *
     * @ORM\Column(name="iddescuento", type="integer", nullable=false)
     */
    private $iddescuento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idconfiguracion", type="integer", nullable=false)
     */
    private $idconfiguracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idesta", type="integer", nullable=false)
     */
    private $idesta;



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
     * Set idestapago
     *
     * @param integer $idestapago
     *
     * @return Multas
     */
    public function setIdestapago($idestapago)
    {
        $this->idestapago = $idestapago;

        return $this;
    }

    /**
     * Get idestapago
     *
     * @return integer
     */
    public function getIdestapago()
    {
        return $this->idestapago;
    }

    /**
     * Set iddescuento
     *
     * @param integer $iddescuento
     *
     * @return Multas
     */
    public function setIddescuento($iddescuento)
    {
        $this->iddescuento = $iddescuento;

        return $this;
    }

    /**
     * Get iddescuento
     *
     * @return integer
     */
    public function getIddescuento()
    {
        return $this->iddescuento;
    }

    /**
     * Set idconfiguracion
     *
     * @param integer $idconfiguracion
     *
     * @return Multas
     */
    public function setIdconfiguracion($idconfiguracion)
    {
        $this->idconfiguracion = $idconfiguracion;

        return $this;
    }

    /**
     * Get idconfiguracion
     *
     * @return integer
     */
    public function getIdconfiguracion()
    {
        return $this->idconfiguracion;
    }

    /**
     * Set idesta
     *
     * @param integer $idesta
     *
     * @return Multas
     */
    public function setIdesta($idesta)
    {
        $this->idesta = $idesta;

        return $this;
    }

    /**
     * Get idesta
     *
     * @return integer
     */
    public function getIdesta()
    {
        return $this->idesta;
    }
}
