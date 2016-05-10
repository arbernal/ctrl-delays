<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarifas
 *
 * @ORM\Table(name="tarifas", indexes={@ORM\Index(name="fk_configuracion_Cata1_idx", columns={"idEsta"}), @ORM\Index(name="fk_tarifas_Cata1_idx", columns={"idTipoTari"})})
 * @ORM\Entity
 */
class Tarifas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTari", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtari;

    /**
     * @var integer
     *
     * @ORM\Column(name="tarifa", type="integer", nullable=true)
     */
    private $tarifa;

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
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTipoTari", referencedColumnName="idCata")
     * })
     */
    private $idtipotari;



    /**
     * Get idtari
     *
     * @return integer
     */
    public function getIdtari()
    {
        return $this->idtari;
    }

    /**
     * Set tarifa
     *
     * @param integer $tarifa
     *
     * @return Tarifas
     */
    public function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    /**
     * Get tarifa
     *
     * @return integer
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }

    /**
     * Set idesta
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idesta
     *
     * @return Tarifas
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
     * Set idtipotari
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idtipotari
     *
     * @return Tarifas
     */
    public function setIdtipotari(\Teknei\CtrlBundle\Entity\Cata $idtipotari = null)
    {
        $this->idtipotari = $idtipotari;

        return $this;
    }

    /**
     * Get idtipotari
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdtipotari()
    {
        return $this->idtipotari;
    }
}
