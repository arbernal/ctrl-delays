<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multas
 *
 * @ORM\Table(name="multas", indexes={@ORM\Index(name="fk_multas_descuento1_idx", columns={"idReca_desc"}), @ORM\Index(name="fk_multas_Cata1_idx", columns={"idEsta"}), @ORM\Index(name="fk_multas_Cata2_idx", columns={"idEstaPago"})})
 * @ORM\Entity
 */
class Multas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMultas", type="integer", nullable=false)
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
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEsta", referencedColumnName="idCata")
     * })
     */
    private $idesta;

    /**
     * @var \RecaDesc
     *
     * @ORM\ManyToOne(targetEntity="RecaDesc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReca_desc", referencedColumnName="idReca_desc")
     * })
     */
    private $idrecaDesc;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEstaPago", referencedColumnName="idCata")
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
     * Set subtotal
     *
     * @param float $subtotal
     *
     * @return Multas
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Multas
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
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
     * Set idrecaDesc
     *
     * @param \Teknei\CtrlBundle\Entity\RecaDesc $idrecaDesc
     *
     * @return Multas
     */
    public function setIdrecaDesc(\Teknei\CtrlBundle\Entity\RecaDesc $idrecaDesc = null)
    {
        $this->idrecaDesc = $idrecaDesc;

        return $this;
    }

    /**
     * Get idrecaDesc
     *
     * @return \Teknei\CtrlBundle\Entity\RecaDesc
     */
    public function getIdrecaDesc()
    {
        return $this->idrecaDesc;
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
