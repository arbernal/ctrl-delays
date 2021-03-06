<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * RecaDesc
 *
 * @ORM\Table(name="reca_desc", indexes={@ORM\Index(name="fk_descuento_Cata1_idx", columns={"idEsta"}), @ORM\Index(name="fk_reca_desc_Cata1_idx", columns={"idOper"}), @ORM\Index(name="fk_reca_desc_Cata2_idx", columns={"idTipo"})})
 * @ORM\Entity
 */
class RecaDesc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReca_desc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrecaDesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="porce", type="integer", nullable=true)
     */
    private $porce;

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
     *   @ORM\JoinColumn(name="idOper", referencedColumnName="idCata")
     * })
     */
    private $idoper;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTipo", referencedColumnName="idCata")
     * })
     */
    private $idtipo;


}

