<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\RecaDesc;
use Teknei\CtrlBundle\Form\RecaDescType;

/**
 * RecaDesc controller.
 *
 * @Route("/recadesc")
 */
class RecaDescController extends Controller
{
    /**
     * Lists all RecaDesc entities.
     *
     * @Route("/", name="recadesc_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recaDescs = $em->getRepository('TekneiCtrlBundle:RecaDesc')->findAll();

        return $this->render('recadesc/index.html.twig', array(
            'recaDescs' => $recaDescs,
        ));
    }

    /**
     * Creates a new RecaDesc entity.
     *
     * @Route("/new", name="recadesc_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $recaDesc = new RecaDesc();
        $form = $this->createForm('Teknei\CtrlBundle\Form\RecaDescType', $recaDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recaDesc);
            $em->flush();

            return $this->redirectToRoute('recadesc_show', array('id' => $recaDesc->getId()));
        }

        return $this->render('recadesc/new.html.twig', array(
            'recaDesc' => $recaDesc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RecaDesc entity.
     *
     * @Route("/{id}", name="recadesc_show")
     * @Method("GET")
     */
    public function showAction(RecaDesc $recaDesc)
    {
        $deleteForm = $this->createDeleteForm($recaDesc);

        return $this->render('recadesc/show.html.twig', array(
            'recaDesc' => $recaDesc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RecaDesc entity.
     *
     * @Route("/{id}/edit", name="recadesc_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RecaDesc $recaDesc)
    {
        $deleteForm = $this->createDeleteForm($recaDesc);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\RecaDescType', $recaDesc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recaDesc);
            $em->flush();

            return $this->redirectToRoute('recadesc_edit', array('id' => $recaDesc->getId()));
        }

        return $this->render('recadesc/edit.html.twig', array(
            'recaDesc' => $recaDesc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RecaDesc entity.
     *
     * @Route("/{id}", name="recadesc_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RecaDesc $recaDesc)
    {
        $form = $this->createDeleteForm($recaDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recaDesc);
            $em->flush();
        }

        return $this->redirectToRoute('recadesc_index');
    }

    /**
     * Creates a form to delete a RecaDesc entity.
     *
     * @param RecaDesc $recaDesc The RecaDesc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RecaDesc $recaDesc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recadesc_delete', array('id' => $recaDesc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
