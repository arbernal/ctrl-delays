<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Estatus;
use Teknei\CtrlBundle\Form\EstatusType;

/**
 * Estatus controller.
 *
 * @Route("/estatus")
 */
class EstatusController extends Controller
{
    /**
     * Lists all Estatus entities.
     *
     * @Route("/", name="estatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estatuses = $em->getRepository('TekneiCtrlBundle:Estatus')->findAll();

        return $this->render('TekneiCtrlBundle:estatus:index.html.twig', array(
            'estatuses' => $estatuses,
        ));
    }

    /**
     * Creates a new Estatus entity.
     *
     * @Route("/new", name="estatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $estatus = new Estatus();
        $form = $this->createForm('Teknei\CtrlBundle\Form\EstatusType', $estatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estatus);
            $em->flush();

            return $this->redirectToRoute('estatus_show', array('id' => $estatus->getIdestatus()));
        }

        return $this->render('TekneiCtrlBundle:estatus:new.html.twig', array(
            'estatus' => $estatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Estatus entity.
     *
     * @Route("/{id}", name="estatus_show")
     * @Method("GET")
     */
    public function showAction(Estatus $estatus)
    {
        $deleteForm = $this->createDeleteForm($estatus);

        return $this->render('TekneiCtrlBundle:estatus:show.html.twig', array(
            'estatus' => $estatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Estatus entity.
     *
     * @Route("/{id}/edit", name="estatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Estatus $estatus)
    {
        $deleteForm = $this->createDeleteForm($estatus);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\EstatusType', $estatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estatus);
            $em->flush();

            return $this->redirectToRoute('estatus_edit', array('id' => $estatus->getIdestatus()));
        }

        return $this->render('TekneiCtrlBundle:estatus:edit.html.twig', array(
            'estatus' => $estatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Estatus entity.
     *
     * @Route("/{id}", name="estatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Estatus $estatus)
    {
        $form = $this->createDeleteForm($estatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estatus);
            $em->flush();
        }

        return $this->redirectToRoute('estatus_index');
    }

    /**
     * Creates a form to delete a Estatus entity.
     *
     * @param Estatus $estatus The Estatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estatus $estatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estatus_delete', array('id' => $estatus->getIdestatus())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
