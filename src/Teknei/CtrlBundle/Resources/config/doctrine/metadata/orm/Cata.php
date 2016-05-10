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
     * @ORM\Column(name="idcata", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcata;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_cort", type="string", length=15, nullable=true)
     */
    private $descCort;

    /**
     * @var string
     *
     * @ORM\Column(name="des_comp", type="string", length=45, nullable=true)
     */
    private $desComp;

    /**
     * @var integer
     *
     * @ORM\Column(name="Idesta", type="integer", nullable=true)
     */
    private $idesta;


}

