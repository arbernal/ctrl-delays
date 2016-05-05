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
     * @ORM\Column(name="idconfiguracion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idconfiguracion;

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
     * Get idconfiguracion
     *
     * @return integer
     */
    public function getIdconfiguracion()
    {
        return $this->idconfiguracion;
    }

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
}
