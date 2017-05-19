<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Team controller.
 *
 */
class teamController extends Controller
{
    /**
     * Lists all team entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teams = $em->getRepository('IcoderBundle:team')->findAll();

        return $this->render('IcoderBundle:team:index.html.twig', array(
            'teams' => $teams,
        ));
    }

    /**
     * Creates a new team entity.
     *
     */
    public function newAction(Request $request)
    {
        $team = new Team();
        $form = $this->createForm('IcoderBundle\Form\teamType', $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            return $this->redirectToRoute('team_show', array('id' => $team->getId()));
        }

        return $this->render('IcoderBundle:team:new.html.twig', array(
            'team' => $team,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a team entity.
     *
     */
    public function showAction(team $team)
    {
        $deleteForm = $this->createDeleteForm($team);

        return $this->render('IcoderBundle:team:show.html.twig', array(
            'team' => $team,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing team entity.
     *
     */
    public function editAction(Request $request, team $team)
    {
        $deleteForm = $this->createDeleteForm($team);
        $editForm = $this->createForm('IcoderBundle\Form\teamType', $team);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('team_edit', array('id' => $team->getId()));
        }

        return $this->render('IcoderBundle:team:edit.html.twig', array(
            'team' => $team,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a team entity.
     *
     */
    public function deleteAction(Request $request, team $team)
    {
        $form = $this->createDeleteForm($team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($team);
            $em->flush();
        }

        return $this->redirectToRoute('team_index');
    }

    /**
     * Creates a form to delete a team entity.
     *
     * @param team $team The team entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(team $team)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('team_delete', array('id' => $team->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
