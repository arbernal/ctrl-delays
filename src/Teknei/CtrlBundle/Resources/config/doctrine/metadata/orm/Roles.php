<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles", indexes={@ORM\Index(name="fk_roles_Cata1_idx", columns={"idEsta"})})
 * @ORM\Entity
 */
class Roles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idroles", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idroles;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=15, nullable=true)
     */
    private $nombre;

    /**
     * @var \Cata
     *
     * @ORM\ManyToOne(targetEntity="Cata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEsta", referencedColumnName="idCata")
     * })
     */
    private $idesta;


}

