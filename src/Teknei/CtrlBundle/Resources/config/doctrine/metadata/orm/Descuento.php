<?php



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


}

