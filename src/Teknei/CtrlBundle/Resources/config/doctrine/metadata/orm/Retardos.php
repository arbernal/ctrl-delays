<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Retardos
 *
 * @ORM\Table(name="retardos", indexes={@ORM\Index(name="fk_retardos_usuario1_idx", columns={"idusuario"}), @ORM\Index(name="fk_retardos_horario1_idx", columns={"idhorario"}), @ORM\Index(name="fk_retardos_multas1_idx", columns={"idmultas"})})
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
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     */
    private $idusuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="idhorario", type="integer", nullable=false)
     */
    private $idhorario;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmultas", type="integer", nullable=false)
     */
    private $idmultas;


}

