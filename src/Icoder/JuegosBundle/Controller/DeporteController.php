<?php

namespace Icoder\JuegosBundle\Controller;

use Icoder\JuegosBundle\Entity\Deporte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Deporte controller.
 *
 */
class DeporteController extends Controller
{
    /**
     * Lists all deporte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
     
        $re = $em->getRepository('IcoderJuegosBundle:Deporte');
     
        $deportes = $re->findAll();
        return $this->render('IcoderJuegosBundle:deporte:index.html.twig', array(
            'deportes' => $deportes,
        ));
    }

    /**
     * Creates a new deporte entity.
     *
     */
    public function newAction(Request $request)
    {
        $deporte = new Deporte();
        $form = $this->createForm('Icoder\JuegosBundle\Form\DeporteType', $deporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deporte);
            $em->flush();

            return $this->redirectToRoute('deporte_show', array('id' => $deporte->getId()));
        }

        return $this->render('IcoderJuegosBundle:deporte:new.html.twig', array(
            'deporte' => $deporte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a deporte entity.
     *
     */
    public function showAction(Deporte $deporte)
    {
        $deleteForm = $this->createDeleteForm($deporte);

        return $this->render('IcoderJuegosBundle:deporte:show.html.twig', array(
            'deporte' => $deporte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing deporte entity.
     *
     */
    public function editAction(Request $request, Deporte $deporte)
    {
        $deleteForm = $this->createDeleteForm($deporte);
        $editForm = $this->createForm('Icoder\JuegosBundle\Form\DeporteType', $deporte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('deporte_edit', array('id' => $deporte->getId()));
        }

        return $this->render('IcoderJuegosBundle:deporte:edit.html.twig', array(
            'deporte' => $deporte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a deporte entity.
     *
     */
    public function deleteAction(Request $request, Deporte $deporte)
    {
        $form = $this->createDeleteForm($deporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($deporte);
            $em->flush();
        }

        return $this->redirectToRoute('deporte_index');
    }

    /**
     * Creates a form to delete a deporte entity.
     *
     * @param Deporte $deporte The deporte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Deporte $deporte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deporte_delete', array('id' => $deporte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
