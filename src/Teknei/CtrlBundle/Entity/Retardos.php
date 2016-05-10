<?php

namespace Teknei\CtrlBundle\Entity;

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
     * Set idrecaSema
     *
     * @param integer $idrecaSema
     *
     * @return Retardos
     */
    public function setIdrecaSema($idrecaSema)
    {
        $this->idrecaSema = $idrecaSema;

        return $this;
    }

    /**
     * Get idrecaSema
     *
     * @return integer
     */
    public function getIdrecaSema()
    {
        return $this->idrecaSema;
    }

    /**
     * Set idesta
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idesta
     *
     * @return Retardos
     */
    public function setIdesta(\Teknei\CtrlBundle\Entity\Cata $idesta = null)
    {
        $this->idesta = $idesta;

        return $this;
    }

    /**
     * Get idesta
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdesta()
    {
        return $this->idesta;
    }

    /**
     * Set idusuario
     *
     * @param \Teknei\CtrlBundle\Entity\Usuario $idusuario
     *
     * @return Retardos
     */
    public function setIdusuario(\Teknei\CtrlBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \Teknei\CtrlBundle\Entity\Usuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set idhorario
     *
     * @param \Teknei\CtrlBundle\Entity\Horario $idhorario
     *
     * @return Retardos
     */
    public function setIdhorario(\Teknei\CtrlBundle\Entity\Horario $idhorario = null)
    {
        $this->idhorario = $idhorario;

        return $this;
    }

    /**
     * Get idhorario
     *
     * @return \Teknei\CtrlBundle\Entity\Horario
     */
    public function getIdhorario()
    {
        return $this->idhorario;
    }

    /**
     * Set idmultas
     *
     * @param \Teknei\CtrlBundle\Entity\Multas $idmultas
     *
     * @return Retardos
     */
    public function setIdmultas(\Teknei\CtrlBundle\Entity\Multas $idmultas = null)
    {
        $this->idmultas = $idmultas;

        return $this;
    }

    /**
     * Get idmultas
     *
     * @return \Teknei\CtrlBundle\Entity\Multas
     */
    public function getIdmultas()
    {
        return $this->idmultas;
    }

    /**
     * Set idtari
     *
     * @param \Teknei\CtrlBundle\Entity\Tarifas $idtari
     *
     * @return Retardos
     */
    public function setIdtari(\Teknei\CtrlBundle\Entity\Tarifas $idtari = null)
    {
        $this->idtari = $idtari;

        return $this;
    }

    /**
     * Get idtari
     *
     * @return \Teknei\CtrlBundle\Entity\Tarifas
     */
    public function getIdtari()
    {
        return $this->idtari;
    }
}
