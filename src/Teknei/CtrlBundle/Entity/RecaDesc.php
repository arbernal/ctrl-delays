<?php

namespace Teknei\CtrlBundle\Entity;

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



    /**
     * Get idrecaDesc
     *
     * @return integer
     */
    public function getIdrecaDesc()
    {
        return $this->idrecaDesc;
    }

    /**
     * Set porce
     *
     * @param integer $porce
     *
     * @return RecaDesc
     */
    public function setPorce($porce)
    {
        $this->porce = $porce;

        return $this;
    }

    /**
     * Get porce
     *
     * @return integer
     */
    public function getPorce()
    {
        return $this->porce;
    }

    /**
     * Set idesta
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idesta
     *
     * @return RecaDesc
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
     * Set idoper
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idoper
     *
     * @return RecaDesc
     */
    public function setIdoper(\Teknei\CtrlBundle\Entity\Cata $idoper = null)
    {
        $this->idoper = $idoper;

        return $this;
    }

    /**
     * Get idoper
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdoper()
    {
        return $this->idoper;
    }

    /**
     * Set idtipo
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idtipo
     *
     * @return RecaDesc
     */
    public function setIdtipo(\Teknei\CtrlBundle\Entity\Cata $idtipo = null)
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    /**
     * Get idtipo
     *
     * @return \Teknei\CtrlBundle\Entity\Cata
     */
    public function getIdtipo()
    {
        return $this->idtipo;
    }
}
