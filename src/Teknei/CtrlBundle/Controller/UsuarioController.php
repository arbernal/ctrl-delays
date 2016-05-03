<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Usuario;
use Teknei\CtrlBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{
    /**
     * Lists all Usuario entities.
     *
     * @Route("/", name="usuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('TekneiCtrlBundle:Usuario')->findAll();

        return $this->render('TekneiCtrlBundle:usuario:index.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Creates a new Usuario entity.
     *
     * @Route("/new", name="usuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('Teknei\CtrlBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuario_show', array('id' => $usuario->getIdusuario()));
        }

        return $this->render('TekneiCtrlBundle:usuario:new.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     */
    public function showAction(Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('TekneiCtrlBundle:usuario:show.html.twig', array(
            'usuario' => $usuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{id}/edit", name="usuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\UsuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuario_edit', array('id' => $usuario->getIdusuario()));
        }

        return $this->render('TekneiCtrlBundle:usuario:edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}", name="usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Usuario $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            $em->flush();
        }

        return $this->redirectToRoute('usuario_index');
    }

    /**
     * Creates a form to delete a Usuario entity.
     *
     * @param Usuario $usuario The Usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuario $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $usuario->getIdusuario())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
