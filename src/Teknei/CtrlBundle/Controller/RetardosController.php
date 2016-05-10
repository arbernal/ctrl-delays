<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Retardos;
use Teknei\CtrlBundle\Form\RetardosType;

/**
 * Retardos controller.
 *
 * @Route("/retardos")
 */
class RetardosController extends Controller
{
    /**
     * Lists all Retardos entities.
     *
     * @Route("/", name="retardos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $retardos = $em->getRepository('TekneiCtrlBundle:Retardos')->findAll();

        return $this->render('retardos/index.html.twig', array(
            'retardos' => $retardos,
        ));
    }

    /**
     * Creates a new Retardos entity.
     *
     * @Route("/new", name="retardos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $retardo = new Retardos();
        $form = $this->createForm('Teknei\CtrlBundle\Form\RetardosType', $retardo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($retardo);
            $em->flush();

            return $this->redirectToRoute('retardos_show', array('id' => $retardo->getId()));
        }

        return $this->render('retardos/new.html.twig', array(
            'retardo' => $retardo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Retardos entity.
     *
     * @Route("/{id}", name="retardos_show")
     * @Method("GET")
     */
    public function showAction(Retardos $retardo)
    {
        $deleteForm = $this->createDeleteForm($retardo);

        return $this->render('retardos/show.html.twig', array(
            'retardo' => $retardo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Retardos entity.
     *
     * @Route("/{id}/edit", name="retardos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Retardos $retardo)
    {
        $deleteForm = $this->createDeleteForm($retardo);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\RetardosType', $retardo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($retardo);
            $em->flush();

            return $this->redirectToRoute('retardos_edit', array('id' => $retardo->getId()));
        }

        return $this->render('retardos/edit.html.twig', array(
            'retardo' => $retardo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Retardos entity.
     *
     * @Route("/{id}", name="retardos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Retardos $retardo)
    {
        $form = $this->createDeleteForm($retardo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($retardo);
            $em->flush();
        }

        return $this->redirectToRoute('retardos_index');
    }

    /**
     * Creates a form to delete a Retardos entity.
     *
     * @param Retardos $retardo The Retardos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Retardos $retardo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('retardos_delete', array('id' => $retardo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
