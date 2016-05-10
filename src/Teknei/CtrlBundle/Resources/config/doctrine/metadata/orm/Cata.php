<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Cata
 *
 * @ORM\Table(name="cata")
 * @ORM\Entity
 */
class Cata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCata", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcata;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_cort", type="string", length=5, nullable=true)
     */
    private $descCort;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_comp", type="string", length=30, nullable=true)
     */
    private $descComp;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEsta", type="integer", nullable=true)
     */
    private $idesta;


}

