<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Teknei\CtrlBundle\Entity\Horario;
use Teknei\CtrlBundle\Form\HorarioType;

/**
 * Horario controller.
 *
 * @Route("/horario")
 */
class HorarioController extends Controller
{
    /**
     * Lists all Horario entities.
     *
     * @Route("/", name="horario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $horarios = $em->getRepository('TekneiCtrlBundle:Horario')->findAll();

        return $this->render('TekneiCtrlBundle:horario:index.html.twig', array(
            'horarios' => $horarios,
        ));
    }

    /**
     * Creates a new Horario entity.
     *
     * @Route("/new", name="horario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $horario = new Horario();
        $form = $this->createForm('Teknei\CtrlBundle\Form\HorarioType', $horario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horario);
            $em->flush();

            return $this->redirectToRoute('horario_show', array('id' => $horario->getIdhorario()));
        }

        return $this->render('TekneiCtrlBundle:horario:new.html.twig', array(
            'horario' => $horario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Horario entity.
     *
     * @Route("/{id}", name="horario_show")
     * @Method("GET")
     */
    public function showAction(Horario $horario)
    {
        $deleteForm = $this->createDeleteForm($horario);

        return $this->render('TekneiCtrlBundle:horario:show.html.twig', array(
            'horario' => $horario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Horario entity.
     *
     * @Route("/{id}/edit", name="horario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Horario $horario)
    {
        $deleteForm = $this->createDeleteForm($horario);
        $editForm = $this->createForm('Teknei\CtrlBundle\Form\HorarioType', $horario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horario);
            $em->flush();

            return $this->redirectToRoute('horario_index', array('id' => $horario->getIdhorario()));
        }

        return $this->render('TekneiCtrlBundle:horario:edit.html.twig', array(
            'horario' => $horario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
      }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}/delete", name="horario_delete")
     *  @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Horario $horario)
    {
    		$em = $this->getDoctrine()->getManager();
    		$cata = $em->getRepository('TekneiCtrlBundle:cata')->find(2);
    		$horario->setIdesta($cata);
            $em->merge($horario);
            $em->flush();
        

        return $this->redirectToRoute('horario_index');
    }
        

    /**
     * Creates a form to delete a Horario entity.
     *
     * @param Horario $horario The Horario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Horario $horario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('horario_delete', array('id' => $horario->getIdhorario())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
