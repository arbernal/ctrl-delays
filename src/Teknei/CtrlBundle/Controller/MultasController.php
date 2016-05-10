<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Multas;
use Teknei\CtrlBundle\Form\MultasType;

/**
 * Multas controller.
 *
 * @Route("/multas")
 */
class MultasController extends Controller
{
    /**
     * Lists all Multas entities.
     *
     * @Route("/", name="multas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $multas = $em->getRepository('TekneiCtrlBundle:Multas')->findAll();

        return $this->render('multas/index.html.twig', array(
            'multas' => $multas,
        ));
    }

    /**
     * Creates a new Multas entity.
     *
     * @Route("/new", name="multas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $multa = new Multas();
        $form = $this->createForm('Teknei\CtrlBundle\Form\MultasType', $multa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($multa);
            $em->flush();

            return $this->redirectToRoute('multas_show', array('id' => $multa->getId()));
        }

        return $this->render('multas/new.html.twig', array(
            'multa' => $multa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Multas entity.
     *
     * @Route("/{id}", name="multas_show")
     * @Method("GET")
     */
    public function showAction(Multas $multa)
    {
        $deleteForm = $this->createDeleteForm($multa);

        return $this->render('multas/show.html.twig', array(
            'multa' => $multa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Multas entity.
     *
     * @Route("/{id}/edit", name="multas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Multas $multa)
    {
        $deleteForm = $this->createDeleteForm($multa);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\MultasType', $multa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($multa);
            $em->flush();

            return $this->redirectToRoute('multas_edit', array('id' => $multa->getId()));
        }

        return $this->render('multas/edit.html.twig', array(
            'multa' => $multa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Multas entity.
     *
     * @Route("/{id}", name="multas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Multas $multa)
    {
        $form = $this->createDeleteForm($multa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($multa);
            $em->flush();
        }

        return $this->redirectToRoute('multas_index');
    }

    /**
     * Creates a form to delete a Multas entity.
     *
     * @param Multas $multa The Multas entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Multas $multa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('multas_delete', array('id' => $multa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
