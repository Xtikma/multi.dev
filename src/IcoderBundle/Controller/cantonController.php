<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\canton;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Canton controller.
 *
 */
class cantonController extends Controller
{
    /**
     * Lists all canton entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cantons = $em->getRepository('IcoderBundle:canton')->findAll();

        return $this->render('IcoderBundle:canton:index.html.twig', array(
            'cantons' => $cantons,
        ));
    }

    /**
     * Creates a new canton entity.
     *
     */
    public function newAction(Request $request)
    {
        $canton = new Canton();
        $form = $this->createForm('IcoderBundle\Form\cantonType', $canton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($canton);
            $em->flush();

            return $this->redirectToRoute('canton_show', array('id' => $canton->getId()));
        }

        return $this->render('IcoderBundle:canton:new.html.twig', array(
            'canton' => $canton,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a canton entity.
     *
     */
    public function showAction(canton $canton)
    {
        $deleteForm = $this->createDeleteForm($canton);

        return $this->render('IcoderBundle:canton:show.html.twig', array(
            'canton' => $canton,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing canton entity.
     *
     */
    public function editAction(Request $request, canton $canton)
    {
        $deleteForm = $this->createDeleteForm($canton);
        $editForm = $this->createForm('IcoderBundle\Form\cantonType', $canton);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('canton_edit', array('id' => $canton->getId()));
        }

        return $this->render('IcoderBundle:canton:edit.html.twig', array(
            'canton' => $canton,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a canton entity.
     *
     */
    public function deleteAction(Request $request, canton $canton)
    {
        $form = $this->createDeleteForm($canton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($canton);
            $em->flush();
        }

        return $this->redirectToRoute('canton_index');
    }

    /**
     * Creates a form to delete a canton entity.
     *
     * @param canton $canton The canton entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(canton $canton)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('canton_delete', array('id' => $canton->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
