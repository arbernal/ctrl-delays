<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Descuento;
use Teknei\CtrlBundle\Form\DescuentoType;

/**
 * Descuento controller.
 *
 * @Route("/descuento")
 */
class DescuentoController extends Controller
{
    /**
     * Lists all Descuento entities.
     *
     * @Route("/", name="descuento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $descuentos = $em->getRepository('TekneiCtrlBundle:Descuento')->findAll();

        return $this->render('TekneiCtrlBundle:descuento:index.html.twig', array(
            'descuentos' => $descuentos,
        ));
    }

    /**
     * Creates a new Descuento entity.
     *
     * @Route("/new", name="descuento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $descuento = new Descuento();
        $form = $this->createForm('Teknei\CtrlBundle\Form\DescuentoType', $descuento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descuento);
            $em->flush();

            return $this->redirectToRoute('descuento_show', array('id' => $descuento->getIddescuento()));
        }

        return $this->render('TekneiCtrlBundle:descuento:new.html.twig', array(
            'descuento' => $descuento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Descuento entity.
     *
     * @Route("/{id}", name="descuento_show")
     * @Method("GET")
     */
    public function showAction(Descuento $descuento)
    {
        $deleteForm = $this->createDeleteForm($descuento);

        return $this->render('TekneiCtrlBundle:descuento:show.html.twig', array(
            'descuento' => $descuento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Descuento entity.
     *
     * @Route("/{id}/edit", name="descuento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Descuento $descuento)
    {
        $deleteForm = $this->createDeleteForm($descuento);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\DescuentoType', $descuento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descuento);
            $em->flush();

            return $this->redirectToRoute('descuento_edit', array('id' => $descuento->getIddescuento()));
        }

        return $this->render('TekneiCtrlBundle:descuento:edit.html.twig', array(
            'descuento' => $descuento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Descuento entity.
     *
     * @Route("/{id}", name="descuento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Descuento $descuento)
    {
        $form = $this->createDeleteForm($descuento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($descuento);
            $em->flush();
        }

        return $this->redirectToRoute('descuento_index');
    }

    /**
     * Creates a form to delete a Descuento entity.
     *
     * @param Descuento $descuento The Descuento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Descuento $descuento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descuento_delete', array('id' => $descuento->getIddescuento())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
