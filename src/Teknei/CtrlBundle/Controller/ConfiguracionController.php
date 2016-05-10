<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Configuracion;
use Teknei\CtrlBundle\Form\ConfiguracionType;

/**
 * Configuracion controller.
 *
 * @Route("/configuracion")
 */
class ConfiguracionController extends Controller
{
    /**
     * Lists all Configuracion entities.
     *
     * @Route("/", name="configuracion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $configuracions = $em->getRepository('TekneiCtrlBundle:Configuracion')->findAll();

        return $this->render('configuracion/index.html.twig', array(
            'configuracions' => $configuracions,
        ));
    }

    /**
     * Creates a new Configuracion entity.
     *
     * @Route("/new", name="configuracion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $configuracion = new Configuracion();
        $form = $this->createForm('Teknei\CtrlBundle\Form\ConfiguracionType', $configuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracion);
            $em->flush();

            return $this->redirectToRoute('configuracion_show', array('id' => $configuracion->getId()));
        }

        return $this->render('configuracion/new.html.twig', array(
            'configuracion' => $configuracion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Configuracion entity.
     *
     * @Route("/{id}", name="configuracion_show")
     * @Method("GET")
     */
    public function showAction(Configuracion $configuracion)
    {
        $deleteForm = $this->createDeleteForm($configuracion);

        return $this->render('configuracion/show.html.twig', array(
            'configuracion' => $configuracion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Configuracion entity.
     *
     * @Route("/{id}/edit", name="configuracion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Configuracion $configuracion)
    {
        $deleteForm = $this->createDeleteForm($configuracion);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\ConfiguracionType', $configuracion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracion);
            $em->flush();

            return $this->redirectToRoute('configuracion_edit', array('id' => $configuracion->getId()));
        }

        return $this->render('configuracion/edit.html.twig', array(
            'configuracion' => $configuracion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Configuracion entity.
     *
     * @Route("/{id}", name="configuracion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Configuracion $configuracion)
    {
        $form = $this->createDeleteForm($configuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($configuracion);
            $em->flush();
        }

        return $this->redirectToRoute('configuracion_index');
    }

    /**
     * Creates a form to delete a Configuracion entity.
     *
     * @param Configuracion $configuracion The Configuracion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Configuracion $configuracion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('configuracion_delete', array('id' => $configuracion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
