<?php

namespace Icoder\JuegosBundle\Controller;

use Icoder\JuegosBundle\Entity\CategoriasDeporte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categoriasdeporte controller.
 *
 */
class CategoriasDeporteController extends Controller
{
    /**
     * Lists all categoriasDeporte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriasDeportes = $em->getRepository('IcoderJuegosBundle:CategoriasDeporte')->findAll();

        return $this->render('IcoderJuegosBundle:categoriasdeporte:index.html.twig', array(
            'categoriasDeportes' => $categoriasDeportes,
        ));
    }

    /**
     * Creates a new categoriasDeporte entity.
     *
     */
    public function newAction(Request $request)
    {
        $categoriasDeporte = new Categoriasdeporte();
        $form = $this->createForm('Icoder\JuegosBundle\Form\CategoriasDeporteType', $categoriasDeporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriasDeporte);
            $em->flush();

            return $this->redirectToRoute('categoria_show', array('id' => $categoriasDeporte->getId()));
        }

        return $this->render('IcoderJuegosBundle:categoriasdeporte:new.html.twig', array(
            'categoriasDeporte' => $categoriasDeporte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoriasDeporte entity.
     *
     */
    public function showAction(CategoriasDeporte $categoriasDeporte)
    {
        $deleteForm = $this->createDeleteForm($categoriasDeporte);

        return $this->render('IcoderJuegosBundle:categoriasdeporte:show.html.twig', array(
            'categoriasDeporte' => $categoriasDeporte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoriasDeporte entity.
     *
     */
    public function editAction(Request $request, CategoriasDeporte $categoriasDeporte)
    {
        $deleteForm = $this->createDeleteForm($categoriasDeporte);
        $editForm = $this->createForm('Icoder\JuegosBundle\Form\CategoriasDeporteType', $categoriasDeporte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoria_edit', array('id' => $categoriasDeporte->getId()));
        }

        return $this->render('IcoderJuegosBundle:categoriasdeporte:edit.html.twig', array(
            'categoriasDeporte' => $categoriasDeporte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoriasDeporte entity.
     *
     */
    public function deleteAction(Request $request, CategoriasDeporte $categoriasDeporte)
    {
        $form = $this->createDeleteForm($categoriasDeporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoriasDeporte);
            $em->flush();
        }

        return $this->redirectToRoute('categoria_index');
    }

    /**
     * Creates a form to delete a categoriasDeporte entity.
     *
     * @param CategoriasDeporte $categoriasDeporte The categoriasDeporte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategoriasDeporte $categoriasDeporte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoria_delete', array('id' => $categoriasDeporte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
