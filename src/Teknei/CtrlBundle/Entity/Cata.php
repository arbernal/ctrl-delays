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

    /**
     * Set idcata
     *
     * @param integer $idcata
     *
     * @return Cata
     */
    public function setIdcata($idcata)
    {
    	$this->idcata = $idcata;
    
    	return $this;
    }

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
     * Set descComp
     *
     * @param string $descComp
     *
     * @return Cata
     */
    public function setDescComp($descComp)
    {
        $this->descComp = $descComp;

        return $this;
    }

    /**
     * Get descComp
     *
     * @return string
     */
    public function getDescComp()
    {
        return $this->descComp;
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
