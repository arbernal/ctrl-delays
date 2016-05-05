<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descuento
 *
 * @ORM\Table(name="descuento", indexes={@ORM\Index(name="fk_descuento_cata1_idx", columns={"idesta"})})
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
     * @var integer
     *
     * @ORM\Column(name="idesta", type="integer", nullable=false)
     */
    private $idesta;



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

    /**
     * Set idesta
     *
     * @param integer $idesta
     *
     * @return Descuento
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
