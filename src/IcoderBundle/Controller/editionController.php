<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\edition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Edition controller.
 *
 */
class editionController extends Controller
{
    /**
     * Lists all edition entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $editions = $em->getRepository('IcoderBundle:edition')->findAll();

        return $this->render('IcoderBundle:edition:index.html.twig', array(
            'editions' => $editions,
        ));
    }

    /**
     * Creates a new edition entity.
     *
     */
    public function newAction(Request $request)
    {
        $edition = new Edition();
        $form = $this->createForm('IcoderBundle\Form\editionType', $edition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($edition);
            $em->flush();

            return $this->redirectToRoute('editions_show', array('id' => $edition->getId()));
        }

        return $this->render('IcoderBundle:edition:new.html.twig', array(
            'edition' => $edition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a edition entity.
     *
     */
    public function showAction(edition $edition)
    {
        $deleteForm = $this->createDeleteForm($edition);

        return $this->render('IcoderBundle:edition:show.html.twig', array(
            'edition' => $edition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing edition entity.
     *
     */
    public function editAction(Request $request, edition $edition)
    {
        $deleteForm = $this->createDeleteForm($edition);
        $editForm = $this->createForm('IcoderBundle\Form\editionType', $edition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editions_edit', array('id' => $edition->getId()));
        }

        return $this->render('IcoderBundle:edition:edit.html.twig', array(
            'edition' => $edition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a edition entity.
     *
     */
    public function deleteAction(Request $request, edition $edition)
    {
        $form = $this->createDeleteForm($edition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($edition);
            $em->flush();
        }

        return $this->redirectToRoute('editions_index');
    }

    /**
     * Creates a form to delete a edition entity.
     *
     * @param edition $edition The edition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(edition $edition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editions_delete', array('id' => $edition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
