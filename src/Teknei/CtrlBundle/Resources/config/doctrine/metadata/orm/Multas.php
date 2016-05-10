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
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idesta", referencedColumnName="idcata")
     * })
     */
    private $idesta;

    /**
     * @var \Descuento
     *
     * @ORM\ManyToOne(targetEntity="Descuento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddescuento", referencedColumnName="iddescuento")
     * })
     */
    private $iddescuento;

    /**
     * @var \Configuracion
     *
     * @ORM\ManyToOne(targetEntity="Configuracion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idconfiguracion", referencedColumnName="idconfiguracion")
     * })
     */
    private $idconfiguracion;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Idestapago", referencedColumnName="idcata")
     * })
     */
    private $idestapago;


}

