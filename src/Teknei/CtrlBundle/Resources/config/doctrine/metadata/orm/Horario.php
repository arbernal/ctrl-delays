<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario")
 * @ORM\Entity
 */
class Horario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhorario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhorario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dia", type="date", nullable=true)
     */
    private $dia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=true)
     */
    private $hora;


}

