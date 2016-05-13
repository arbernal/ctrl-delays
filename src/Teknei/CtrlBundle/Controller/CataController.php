<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Cata;
use Teknei\CtrlBundle\Form\CataType;

/**
 * Cata controller.
 *
 * @Route("/cata")
 */
class CataController extends Controller
{
    /**
     * Lists all Cata entities.
     *
     * @Route("/", name="cata_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $catas = $em->getRepository('TekneiCtrlBundle:Cata')->findAll();

        return $this->render('TekneiCtrlBundle:cata:index.html.twig', array(
            'catas' => $catas,
        ));
    }

    /**
     * Creates a new Cata entity.
     *
     * @Route("/new", name="cata_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $catum = new Cata();
        $form = $this->createForm('Teknei\CtrlBundle\Form\CataType', $catum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($catum);
            $em->flush();

            return $this->redirectToRoute('cata_index');
        }

        return $this->render('TekneiCtrlBundle:cata:new.html.twig', array(
            'catum' => $catum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cata entity.
     *
     * @Route("/{id}", name="cata_show")
     * @Method("GET")
     */
    public function showAction(Cata $catum)
    {
        $deleteForm = $this->createDeleteForm($catum);

        return $this->render('TekneiCtrlBundle:cata:show.html.twig', array(
            'catum' => $catum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cata entity.
     *
     * @Route("/{id}/edit", name="cata_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cata $catum)
    {
        $deleteForm = $this->createDeleteForm($catum);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\CataType', $catum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($catum);
            $em->flush();

            return $this->redirectToRoute('cata_index');
        }

        return $this->render('TekneiCtrlBundle:cata:edit.html.twig', array(
            'catum' => $catum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cata entity.
     *
     *  @Route("/{id}/delete", name="cata_delete")
     *  @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Cata $catum)
    {
    		$em = $this->getDoctrine()->getManager();
    		$cata = $em->getRepository('TekneiCtrlBundle:cata')->find(2);
    		$catum->setIdesta($cata);
            $em->merge($catum);
            $em->flush();

        return $this->redirectToRoute('cata_index');
    }

    /**
     * Creates a form to delete a Cata entity.
     *
     * @param Cata $catum The Cata entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cata $catum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cata_delete', array('id' => $catum->getIdcata())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
