<?php

namespace Teknei\CtrlBundle\Entity;

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



    /**
     * Get idcata
     *
     * @return integer
     */
    public function getIdcata()
    {
        return $this->idcata;
    }

    /**
     * Set descCort
     *
     * @param string $descCort
     *
     * @return Cata
     */
    public function setDescCort($descCort)
    {
        $this->descCort = $descCort;

        return $this;
    }

    /**
     * Get descCort
     *
     * @return string
     */
    public function getDescCort()
    {
        return $this->descCort;
    }

    /**
     * Set desComp
     *
     * @param string $desComp
     *
     * @return Cata
     */
    public function setDesComp($desComp)
    {
        $this->desComp = $desComp;

        return $this;
    }

    /**
     * Get desComp
     *
     * @return string
     */
    public function getDesComp()
    {
        return $this->desComp;
    }

    /**
     * Set idesta
     *
     * @param integer $idesta
     *
     * @return Cata
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
