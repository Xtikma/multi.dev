<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\sport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Sport controller.
 *
 */
class sportController extends Controller
{
    /**
     * Lists all sport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sports = $em->getRepository('IcoderBundle:sport')->findAll();

        return $this->render('IcoderBundle:sport:index.html.twig', array(
            'sports' => $sports,
        ));
    }

    /**
     * Creates a new sport entity.
     *
     */
    public function newAction(Request $request)
    {
        $sport = new Sport();
        $form = $this->createForm('IcoderBundle\Form\sportType', $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sport);
            $em->flush();

            return $this->redirectToRoute('sport_show', array('id' => $sport->getId()));
        }

        return $this->render('IcoderBundle:sport:new.html.twig', array(
            'sport' => $sport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sport entity.
     *
     */
    public function showAction(sport $sport)
    {
        $deleteForm = $this->createDeleteForm($sport);

        return $this->render('IcoderBundle:sport:show.html.twig', array(
            'sport' => $sport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sport entity.
     *
     */
    public function editAction(Request $request, sport $sport)
    {
        $deleteForm = $this->createDeleteForm($sport);
        $editForm = $this->createForm('IcoderBundle\Form\sportType', $sport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sport_edit', array('id' => $sport->getId()));
        }

        return $this->render('IcoderBundle:sport:edit.html.twig', array(
            'sport' => $sport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sport entity.
     *
     */
    public function deleteAction(Request $request, sport $sport)
    {
        $form = $this->createDeleteForm($sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sport);
            $em->flush();
        }

        return $this->redirectToRoute('sport_index');
    }

    /**
     * Creates a form to delete a sport entity.
     *
     * @param sport $sport The sport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(sport $sport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sport_delete', array('id' => $sport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
