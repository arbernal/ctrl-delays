<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Tarifas
 *
 * @ORM\Table(name="tarifas", indexes={@ORM\Index(name="fk_configuracion_Cata1_idx", columns={"idEsta"}), @ORM\Index(name="fk_tarifas_Cata1_idx", columns={"idTipoTari"})})
 * @ORM\Entity
 */
class Tarifas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTari", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtari;

    /**
     * @var integer
     *
     * @ORM\Column(name="tarifa", type="integer", nullable=true)
     */
    private $tarifa;

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
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTipoTari", referencedColumnName="idCata")
     * })
     */
    private $idtipotari;


}

