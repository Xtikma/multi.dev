<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Type controller.
 *
 */
class typeController extends Controller
{
    /**
     * Lists all type entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('IcoderBundle:type')->findAll();

        return $this->render('IcoderBundle:type:index.html.twig', array(
            'types' => $types,
        ));
    }

    /**
     * Creates a new type entity.
     *
     */
    public function newAction(Request $request)
    {
        $type = new Type();
        $form = $this->createForm('IcoderBundle\Form\typeType', $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('type_show', array('id' => $type->getId()));
        }

        return $this->render('IcoderBundle:type:new.html.twig', array(
            'type' => $type,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type entity.
     *
     */
    public function showAction(type $type)
    {
        $deleteForm = $this->createDeleteForm($type);

        return $this->render('IcoderBundle:type:show.html.twig', array(
            'type' => $type,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type entity.
     *
     */
    public function editAction(Request $request, type $type)
    {
        $deleteForm = $this->createDeleteForm($type);
        $editForm = $this->createForm('IcoderBundle\Form\typeType', $type);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_edit', array('id' => $type->getId()));
        }

        return $this->render('IcoderBundle:type:edit.html.twig', array(
            'type' => $type,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type entity.
     *
     */
    public function deleteAction(Request $request, type $type)
    {
        $form = $this->createDeleteForm($type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($type);
            $em->flush();
        }

        return $this->redirectToRoute('type_index');
    }

    /**
     * Creates a form to delete a type entity.
     *
     * @param type $type The type entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(type $type)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_delete', array('id' => $type->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
