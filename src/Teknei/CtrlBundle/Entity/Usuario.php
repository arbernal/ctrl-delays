<?php

namespace Teknei\CtrlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_roles_idx", columns={"idroles"})})
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
     * @ORM\Column(name="nombre", type="string", length=39, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=10, nullable=true)
     */
    private $contrasena;

    /**
     * @var integer
     *
     * @ORM\Column(name="idroles", type="integer", nullable=false)
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
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
     * Set idroles
     *
     * @param integer $idroles
     *
     * @return Usuario
     */
    public function setIdroles($idroles)
    {
        $this->idroles = $idroles;

        return $this;
    }

    /**
     * Get idroles
     *
     * @return integer
     */
    public function getIdroles()
    {
        return $this->idroles;
    }
}
