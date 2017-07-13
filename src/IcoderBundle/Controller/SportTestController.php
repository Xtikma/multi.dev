<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\SportTest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Sporttest controller.
 *
 */
class SportTestController extends Controller
{
    /**
     * Lists all sportTest entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sportTests = $em->getRepository('IcoderBundle:SportTest')->findAll();

        return $this->render('IcoderBundle:SportTest:index.html.twig', array(
            'sportTests' => $sportTests,
        ));
    }

    /**
     * Creates a new sportTest entity.
     *
     */
    public function newAction(Request $request)
    {
        $sportTest = new SportTest();
        $sportTest->setDate(new \DateTime("now"));
        $form = $this->createForm('IcoderBundle\Form\SportTestType', $sportTest);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sportTest);
            $em->flush();

            return $this->redirectToRoute('test_show', array('id' => $sportTest->getId()));
        }

        return $this->render('IcoderBundle:SportTest:new.html.twig', array(
            'sportTest' => $sportTest,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sportTest entity.
     *
     */
    public function showAction(SportTest $sportTest)
    {
        $deleteForm = $this->createDeleteForm($sportTest);

        return $this->render('IcoderBundle:SportTest:show.html.twig', array(
            'sportTest' => $sportTest,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sportTest entity.
     *
     */
    public function editAction(Request $request, SportTest $sportTest)
    {
        $deleteForm = $this->createDeleteForm($sportTest);
        $editForm = $this->createForm('IcoderBundle\Form\SportTestType', $sportTest);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_edit', array('id' => $sportTest->getId()));
        }

        return $this->render('IcoderBundle:SportTest:edit.html.twig', array(
            'sportTest' => $sportTest,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sportTest entity.
     *
     */
    public function deleteAction(Request $request, SportTest $sportTest)
    {
        $form = $this->createDeleteForm($sportTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sportTest);
            $em->flush();
        }

        return $this->redirectToRoute('test_index');
    }

    /**
     * Creates a form to delete a sportTest entity.
     *
     * @param SportTest $sportTest The sportTest entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SportTest $sportTest)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_delete', array('id' => $sportTest->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
