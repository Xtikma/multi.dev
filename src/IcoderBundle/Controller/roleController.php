<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\role;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Role controller.
 *
 */
class roleController extends Controller
{
    /**
     * Lists all role entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $roles = $em->getRepository('IcoderBundle:role')->findAll();

        return $this->render('IcoderBundle:role:index.html.twig', array(
            'roles' => $roles,
        ));
    }

    /**
     * Creates a new role entity.
     *
     */
    public function newAction(Request $request)
    {
        $role = new Role();
        $form = $this->createForm('IcoderBundle\Form\roleType', $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();

            return $this->redirectToRoute('user_role_show', array('id' => $role->getId()));
        }

        return $this->render('IcoderBundle:role:new.html.twig', array(
            'role' => $role,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a role entity.
     *
     */
    public function showAction(role $role)
    {
        $deleteForm = $this->createDeleteForm($role);

        return $this->render('IcoderBundle:role:show.html.twig', array(
            'role' => $role,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing role entity.
     *
     */
    public function editAction(Request $request, role $role)
    {
        $deleteForm = $this->createDeleteForm($role);
        $editForm = $this->createForm('IcoderBundle\Form\roleType', $role);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_role_edit', array('id' => $role->getId()));
        }

        return $this->render('IcoderBundle:role:edit.html.twig', array(
            'role' => $role,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a role entity.
     *
     */
    public function deleteAction(Request $request, role $role)
    {
        $form = $this->createDeleteForm($role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($role);
            $em->flush();
        }

        return $this->redirectToRoute('user_role_index');
    }

    /**
     * Creates a form to delete a role entity.
     *
     * @param role $role The role entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(role $role)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_role_delete', array('id' => $role->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
