<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estatus
 *
 * @ORM\Table(name="estatus")
 * @ORM\Entity
 */
class Estatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idestatus", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idestatus;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=45, nullable=true)
     */
    private $tipo;



    /**
     * Get idestatus
     *
     * @return integer
     */
    public function getIdestatus()
    {
        return $this->idestatus;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Estatus
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
}
