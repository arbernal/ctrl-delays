<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion")
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
}
