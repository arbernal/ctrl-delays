<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_roles_idx", columns={"idroles"}), @ORM\Index(name="fk_usuario_Cata1_idx", columns={"idEsta"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=39, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=10, nullable=true)
     */
    private $contrasena;

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
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idroles", referencedColumnName="idroles")
     * })
     */
    private $idroles;



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
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     *
     * @return Usuario
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set idesta
     *
     * @param \Teknei\CtrlBundle\Entity\Cata $idesta
     *
     * @return Usuario
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
     * Set idroles
     *
     * @param \Teknei\CtrlBundle\Entity\Roles $idroles
     *
     * @return Usuario
     */
    public function setIdroles(\Teknei\CtrlBundle\Entity\Roles $idroles = null)
    {
        $this->idroles = $idroles;

        return $this;
    }

    /**
     * Get idroles
     *
     * @return \Teknei\CtrlBundle\Entity\Roles
     */
    public function getIdroles()
    {
        return $this->idroles;
    }
}
