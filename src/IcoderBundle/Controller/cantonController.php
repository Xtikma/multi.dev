<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\canton;
use IcoderBundle\Entity\province;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Canton controller.
 *
 */
class cantonController extends Controller {

    /**
     * Lists all canton entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $cantons = $em->getRepository('IcoderBundle:canton')->findAll();

        return $this->render('IcoderBundle:canton:index.html.twig', array(
                    'cantons' => $cantons,
        ));
    }

    public function view_listAction($province) {
        $em = $this->getDoctrine()->getManager();

        $provinceNew = new province();
        $provinceNew = $this->getDoctrine()
                ->getRepository('IcoderBundle:province')
                ->find($province);

        $cantons = $provinceNew->getCantones();

        return $this->render('IcoderBundle:canton:view_list.html.twig', array(
                    'cantons' => $cantons,
        ));
    }

    /**
     * Creates a new canton entity.
     *
     */
    public function newAction(Request $request) {
        $canton = new Canton();
        $form = $this->createForm('IcoderBundle\Form\cantonType', $canton);
        $form->handleRequest($request);

        $province = new province();
        $province = $canton->getProvince();


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('IcoderBundle:canton');
            $cantonOld = $repo->findOneBy(array('name' => $canton->getName()));

            if (is_null($cantonOld)) {
                $em->persist($canton);
                $em->flush();
            }

            return $this->redirectToRoute('province_show', array('id' => $province->getId()));
        }

        return $this->render('IcoderBundle:canton:new.html.twig', array(
                    'canton' => $canton,
                    'form' => $form->createView(),
        ));
    }

    public function new_smallAction(Request $request, province $province) {
        $canton = new canton();
        $canton->setProvince($province);
        $canton->setActive(true);

        $form = $this->createForm('IcoderBundle\Form\cantonType', $canton);
        $form->handleRequest($request);



        return $this->render('IcoderBundle:canton:new_small.html.twig', array(
                    'canton' => $canton,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a canton entity.
     *
     */
    public function showAction(canton $canton) {
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
    public function editAction(Request $request, canton $canton) {
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
    public function deleteAction(Request $request, canton $canton) {
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
    private function createDeleteForm(canton $canton) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('canton_delete', array('id' => $canton->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
