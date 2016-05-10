<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Retardos
 *
 * @ORM\Table(name="retardos", indexes={@ORM\Index(name="fk_retardos_usuario1_idx", columns={"idusuario"}), @ORM\Index(name="fk_retardos_horario1_idx", columns={"idhorario"}), @ORM\Index(name="fk_retardos_multas1_idx", columns={"idmultas"}), @ORM\Index(name="fk_retardos_Cata1_idx", columns={"idEsta"}), @ORM\Index(name="fk_retardos_tarifas1_idx", columns={"idTari"}), @ORM\Index(name="fk_retardos_reca_desc1_idx", columns={"idReca_sema"})})
 * @ORM\Entity
 */
class Retardos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idretardos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idretardos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_llega", type="time", nullable=true)
     */
    private $horaLlega;

    /**
     * @var integer
     *
     * @ORM\Column(name="idReca_sema", type="integer", nullable=true)
     */
    private $idrecaSema;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEsta", referencedColumnName="idCata")
     * })
     */
    private $idesta;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")
     * })
     */
    private $idusuario;

    /**
     * @var \Horario
     *
     * @ORM\ManyToOne(targetEntity="Horario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idhorario", referencedColumnName="idhorario")
     * })
     */
    private $idhorario;

    /**
     * @var \Multas
     *
     * @ORM\ManyToOne(targetEntity="Multas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmultas", referencedColumnName="idMultas")
     * })
     */
    private $idmultas;

    /**
     * @var \Tarifas
     *
     * @ORM\ManyToOne(targetEntity="Tarifas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTari", referencedColumnName="idTari")
     * })
     */
    private $idtari;


}

