<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retardos
 *
 * @ORM\Table(name="retardos", indexes={@ORM\Index(name="fk_retardos_usuario1_idx", columns={"idusuario"}), @ORM\Index(name="fk_retardos_horario1_idx", columns={"idhorario"}), @ORM\Index(name="fk_retardos_multas1_idx", columns={"idmultas"}), @ORM\Index(name="fk_retardos_cata1_idx", columns={"idesta"})})
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

    /**
     * @var integer
     *
     * @ORM\Column(name="idesta", type="integer", nullable=false)
     */
    private $idesta;



    /**
     * Get idretardos
     *
     * @return integer
     */
    public function getIdretardos()
    {
        return $this->idretardos;
    }

    /**
     * Set horaLlega
     *
     * @param \DateTime $horaLlega
     *
     * @return Retardos
     */
    public function setHoraLlega($horaLlega)
    {
        $this->horaLlega = $horaLlega;

        return $this;
    }

    /**
     * Get horaLlega
     *
     * @return \DateTime
     */
    public function getHoraLlega()
    {
        return $this->horaLlega;
    }

    /**
     * Set idusuario
     *
     * @param integer $idusuario
     *
     * @return Retardos
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return integer
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set idhorario
     *
     * @param integer $idhorario
     *
     * @return Retardos
     */
    public function setIdhorario($idhorario)
    {
        $this->idhorario = $idhorario;

        return $this;
    }

    /**
     * Get idhorario
     *
     * @return integer
     */
    public function getIdhorario()
    {
        return $this->idhorario;
    }

    /**
     * Set idmultas
     *
     * @param integer $idmultas
     *
     * @return Retardos
     */
    public function setIdmultas($idmultas)
    {
        $this->idmultas = $idmultas;

        return $this;
    }

    /**
     * Get idmultas
     *
     * @return integer
     */
    public function getIdmultas()
    {
        return $this->idmultas;
    }

    /**
     * Set idesta
     *
     * @param integer $idesta
     *
     * @return Retardos
     */
    public function setIdesta($idesta)
    {
        $this->idesta = $idesta;

        return $this;
    }

    /**
     * Get idesta
     *
     * @return integer
     */
    public function getIdesta()
    {
        return $this->idesta;
    }
}
