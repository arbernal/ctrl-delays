<?php



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


}

