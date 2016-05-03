<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descuento
 *
 * @ORM\Table(name="descuento")
 * @ORM\Entity
 */
class Descuento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iddescuento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddescuento;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;



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
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Descuento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
