<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion", indexes={@ORM\Index(name="fk_configuracion_cata1_idx", columns={"idesta"})})
 * @ORM\Entity
 */
class Configuracion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tarifa", type="integer", nullable=true)
     */
    private $tarifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="idesta", type="integer", nullable=false)
     */
    private $idesta;

    /**
     * @var \Cata
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idconfiguracion", referencedColumnName="idcata")
     * })
     */
    private $idconfiguracion;



    /**
     * Set tarifa
     *
     * @param integer $tarifa
     *
     * @return Configuracion
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
     * @param integer $idesta
     *
     * @return Configuracion
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

    /**
     * Set idconfiguracion
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idconfiguracion
     *
     * @return Configuracion
     */
    public function setIdconfiguracion(\Teknei\CtrlBundle\Entity\Cata $idconfiguracion)
    {
        $this->idconfiguracion = $idconfiguracion;

        return $this;
    }

    /**
     * Get idconfiguracion
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdconfiguracion()
    {
        return $this->idconfiguracion;
    }
}
