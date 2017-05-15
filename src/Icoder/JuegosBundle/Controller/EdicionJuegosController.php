<?php

namespace Icoder\JuegosBundle\Controller;

use Icoder\JuegosBundle\Entity\EdicionJuegos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Edicionjuego controller.
 *
 */
class EdicionJuegosController extends Controller
{
    /**
     * Lists all edicionJuego entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $edicionJuegos = $em->getRepository('IcoderJuegosBundle:EdicionJuegos')->findAll();

        return $this->render('IcoderJuegosBundle:edicionjuegos:index.html.twig', array(
            'edicionJuegos' => $edicionJuegos,
        ));
    }

    /**
     * Creates a new edicionJuego entity.
     *
     */
    public function newAction(Request $request)
    {
        $edicionJuego = new Edicionjuegos();
        $form = $this->createForm('Icoder\JuegosBundle\Form\EdicionJuegosType', $edicionJuego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($edicionJuego);
            $em->flush();

            return $this->redirectToRoute('edicion_show', array('id' => $edicionJuego->getId()));
        }

        return $this->render('IcoderJuegosBundle:edicionjuegos:new.html.twig', array(
            'edicionJuego' => $edicionJuego,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a edicionJuego entity.
     *
     */
    public function showAction(EdicionJuegos $edicionJuego)
    {
        $deleteForm = $this->createDeleteForm($edicionJuego);

        return $this->render('IcoderJuegosBundle:edicionjuegos:show.html.twig', array(
            'edicionJuego' => $edicionJuego,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing edicionJuego entity.
     *
     */
    public function editAction(Request $request, EdicionJuegos $edicionJuego)
    {
        $deleteForm = $this->createDeleteForm($edicionJuego);
        $editForm = $this->createForm('Icoder\JuegosBundle\Form\EdicionJuegosType', $edicionJuego);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edicion_edit', array('id' => $edicionJuego->getId()));
        }

        return $this->render('IcoderJuegosBundle:edicionjuegos:edit.html.twig', array(
            'edicionJuego' => $edicionJuego,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a edicionJuego entity.
     *
     */
    public function deleteAction(Request $request, EdicionJuegos $edicionJuego)
    {
        $form = $this->createDeleteForm($edicionJuego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($edicionJuego);
            $em->flush();
        }

        return $this->redirectToRoute('edicion_index');
    }

    /**
     * Creates a form to delete a edicionJuego entity.
     *
     * @param EdicionJuegos $edicionJuego The edicionJuego entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EdicionJuegos $edicionJuego)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('edicion_delete', array('id' => $edicionJuego->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
