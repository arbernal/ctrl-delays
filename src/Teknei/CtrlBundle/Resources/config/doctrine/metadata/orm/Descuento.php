<?php



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


}

