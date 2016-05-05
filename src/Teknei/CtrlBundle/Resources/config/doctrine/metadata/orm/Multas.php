<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Multas
 *
 * @ORM\Table(name="multas", indexes={@ORM\Index(name="fk_multas_estatus1_idx", columns={"Idestapago"}), @ORM\Index(name="fk_multas_descuento1_idx", columns={"iddescuento"}), @ORM\Index(name="fk_multas_configuracion1_idx", columns={"idconfiguracion"}), @ORM\Index(name="fk_multas_cata1_idx", columns={"idesta"})})
 * @ORM\Entity
 */
class Multas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmultas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmultas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tiem_tran", type="time", nullable=true)
     */
    private $tiemTran;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="Idestapago", type="integer", nullable=false)
     */
    private $idestapago;

    /**
     * @var integer
     *
     * @ORM\Column(name="iddescuento", type="integer", nullable=false)
     */
    private $iddescuento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idconfiguracion", type="integer", nullable=false)
     */
    private $idconfiguracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idesta", type="integer", nullable=false)
     */
    private $idesta;


}
