<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\province;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Province controller.
 *
 */
class provinceController extends Controller
{
    /**
     * Lists all province entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $provinces = $em->getRepository('IcoderBundle:province')->findAll();

        return $this->render('IcoderBundle:province:index.html.twig', array(
            'provinces' => $provinces,
        ));
    }

    /**
     * Creates a new province entity.
     *
     */
    public function newAction(Request $request)
    {
        $province = new Province();
        $form = $this->createForm('IcoderBundle\Form\provinceType', $province);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($province);
            $em->flush();

            return $this->redirectToRoute('province_show', array('id' => $province->getId()));
        }

        return $this->render('IcoderBundle:province:new.html.twig', array(
            'province' => $province,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a province entity.
     *
     */
    public function showAction(province $province)
    {
        $deleteForm = $this->createDeleteForm($province);

        return $this->render('IcoderBundle:province:show.html.twig', array(
            'province' => $province,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing province entity.
     *
     */
    public function editAction(Request $request, province $province)
    {
        $deleteForm = $this->createDeleteForm($province);
        $editForm = $this->createForm('IcoderBundle\Form\provinceType', $province);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('province_edit', array('id' => $province->getId()));
        }

        return $this->render('IcoderBundle:province:edit.html.twig', array(
            'province' => $province,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a province entity.
     *
     */
    public function deleteAction(Request $request, province $province)
    {
        $form = $this->createDeleteForm($province);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($province);
            $em->flush();
        }

        return $this->redirectToRoute('province_index');
    }

    /**
     * Creates a form to delete a province entity.
     *
     * @param province $province The province entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(province $province)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('province_delete', array('id' => $province->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
