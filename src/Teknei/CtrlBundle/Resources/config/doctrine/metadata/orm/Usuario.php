<?php



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


}

