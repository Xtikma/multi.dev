<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\competitor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Competitor controller.
 *
 */
class competitorController extends Controller
{
    /**
     * Lists all competitor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitors = $em->getRepository('IcoderBundle:competitor')->findAll();

        return $this->render('IcoderBundle:competitor:index.html.twig', array(
            'competitors' => $competitors,
        ));
    }

    /**
     * Creates a new competitor entity.
     *
     */
    public function newAction(Request $request)
    {
        $competitor = new Competitor();
        $form = $this->createForm('IcoderBundle\Form\competitorType', $competitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competitor);
            $em->flush();

            return $this->redirectToRoute('competitor_show', array('id' => $competitor->getId()));
        }

        return $this->render('IcoderBundle:competitor:new.html.twig', array(
            'competitor' => $competitor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competitor entity.
     *
     */
    public function showAction(competitor $competitor)
    {
        $deleteForm = $this->createDeleteForm($competitor);

        return $this->render('IcoderBundle:competitor:show.html.twig', array(
            'competitor' => $competitor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competitor entity.
     *
     */
    public function editAction(Request $request, competitor $competitor)
    {
        $deleteForm = $this->createDeleteForm($competitor);
        $editForm = $this->createForm('IcoderBundle\Form\competitorType', $competitor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competitor_edit', array('id' => $competitor->getId()));
        }

        return $this->render('IcoderBundle:competitor:edit.html.twig', array(
            'competitor' => $competitor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competitor entity.
     *
     */
    public function deleteAction(Request $request, competitor $competitor)
    {
        $form = $this->createDeleteForm($competitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competitor);
            $em->flush();
        }

        return $this->redirectToRoute('competitor_index');
    }

    /**
     * Creates a form to delete a competitor entity.
     *
     * @param competitor $competitor The competitor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(competitor $competitor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competitor_delete', array('id' => $competitor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
