<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Tarifas;
use Teknei\CtrlBundle\Form\TarifasType;

/**
 * Tarifas controller.
 *
 * @Route("/tarifas")
 */
class TarifasController extends Controller
{
    /**
     * Lists all Tarifas entities.
     *
     * @Route("/", name="tarifas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tarifas = $em->getRepository('TekneiCtrlBundle:Tarifas')->findAll();

        return $this->render('TekneiCtrlBundle:tarifas:index.html.twig', array(
            'tarifas' => $tarifas,
        ));
    }

    /**
     * Creates a new Tarifas entity.
     *
     * @Route("/new", name="tarifas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarifa = new Tarifas();
        $form = $this->createForm('Teknei\CtrlBundle\Form\TarifasType', $tarifa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarifa);
            $em->flush();

            return $this->redirectToRoute('tarifas_show', array('id' => $tarifa->getIdtari()));
        }

        return $this->render('TekneiCtrlBundle:tarifas:new.html.twig', array(
            'tarifa' => $tarifa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tarifas entity.
     *
     * @Route("/{id}", name="tarifas_show")
     * @Method("GET")
     */
    public function showAction(Tarifas $tarifa)
    {
        $deleteForm = $this->createDeleteForm($tarifa);

        return $this->render('TekneiCtrlBundle:tarifas:show.html.twig', array(
            'tarifa' => $tarifa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tarifas entity.
     *
     * @Route("/{id}/edit", name="tarifas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tarifas $tarifa)
    {
        $deleteForm = $this->createDeleteForm($tarifa);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\TarifasType', $tarifa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarifa);
            $em->flush();

            return $this->redirectToRoute('tarifas_edit', array('id' => $tarifa->getIdtari()));
        }

        return $this->render('TekneiCtrlBundle:tarifas:edit.html.twig', array(
            'tarifa' => $tarifa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tarifas entity.
     *
     * @Route("/{id}", name="tarifas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tarifas $tarifa)
    {
        $form = $this->createDeleteForm($tarifa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarifa);
            $em->flush();
        }

        return $this->redirectToRoute('tarifas_index');
    }

    /**
     * Creates a form to delete a Tarifas entity.
     *
     * @param Tarifas $tarifa The Tarifas entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tarifas $tarifa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarifas_delete', array('id' => $tarifa->getIdtari())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
