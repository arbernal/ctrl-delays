<?php



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
     * @ORM\Column(name="contraseÃ±a", type="string", length=10, nullable=true)
     */
    private $contraseã±a;

    /**
     * @var integer
     *
     * @ORM\Column(name="idroles", type="integer", nullable=false)
     */
    private $idroles;


}

