<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Category controller.
 *
 */
class categoryController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('IcoderBundle:category')->findAll();

        return $this->render('IcoderBundle:category:index.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm('IcoderBundle\Form\categoryType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('sport_category_show', array('id' => $category->getId()));
        }

        return $this->render('IcoderBundle:category:new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction(category $category)
    {
        $deleteForm = $this->createDeleteForm($category);

        return $this->render('IcoderBundle:category:show.html.twig', array(
            'category' => $category,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction(Request $request, category $category)
    {
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm('IcoderBundle\Form\categoryType', $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sport_category_edit', array('id' => $category->getId()));
        }

        return $this->render('IcoderBundle:category:edit.html.twig', array(
            'category' => $category,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a category entity.
     *
     */
    public function deleteAction(Request $request, category $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirectToRoute('sport_category_index');
    }

    /**
     * Creates a form to delete a category entity.
     *
     * @param category $category The category entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(category $category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sport_category_delete', array('id' => $category->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
