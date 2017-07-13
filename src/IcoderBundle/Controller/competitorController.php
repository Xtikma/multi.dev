<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\competitor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IcoderBundle\Entity\canton;
use IcoderBundle\Entity\team;
use IcoderBundle\Entity\inscription;

/**
 * Competitor controller.
 *
 */
class competitorController extends Controller {

    /**
     * Lists all competitor entities.
     *
     */
    public function indexAction() {
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
    public function newAction(Request $request, inscription $ins, canton $can) {
        $dni = $request->request->get('dni');

        $em = $this->getDoctrine()->getManager();
        $competitorOld = $em->getRepository('IcoderBundle:competitor')
                ->findOneBy(array('dni' => $dni));

        $competitor = new competitor();
        $competitor = (is_null($competitorOld)) ? ((new competitor())->setDni($dni)) : $competitorOld;
        $competitor->setActive(true);
        $competitor->setCanton($can);

        $signedUp = false;
        foreach ($competitor->getTeams() as $team) {
            $inscriptionsOld = $team->getInscriptions();
            foreach ($inscriptionsOld as $inscriptionOld) {
                $signedUp = ($inscriptionOld->getEdition()->getId() == $ins->getEdition()->getId());
                if ($signedUp) {
                    break;
                }
            }
            unset($inscriptionOld);
            if ($signedUp) {
                break;
            }
        }
        unset($team);

        $form = $this->createForm('IcoderBundle\Form\competitorType', $competitor);
        $form->handleRequest($request);

        $error = ($signedUp != 0) ? "Competidor Inscrito" : null;
        $error = ($competitor->getActive()) ? $error : "Competidor inactivo";
        $error = ($error) ? $error : 0;
        if ($error) {
            return $this->redirectToRoute('inscription_show', array(
                        'id' => $ins->getId(),
                        'error' => $error
            ));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            if (is_null($competitorOld)) {
                $em->persist($competitor);
            }
            $competitor->addTeam($ins->getTeam());
            $em->flush();
            return $this->redirectToRoute('inscription_show', array(
                        'id' => $ins->getId(),
                        'error' => $error
            ));
        }

        return $this->render('IcoderBundle:competitor:new.html.twig', array(
                    'competitor' => $competitor,
                    'inscription' => $ins,
                    'form' => $form->createView(),
        ));
    }

    public function newByDniAction(Request $request, inscription $ins, canton $can) {
        return $this->render('IcoderBundle:competitor:newDni.html.twig', array(
                    'inscription' => $ins,
                    'canton' => $can,
        ));
    }

    /**
     * Finds and displays a competitor entity.
     *
     */
    public function showAction(competitor $competitor) {
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
    public function editAction(Request $request, competitor $competitor) {
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
    public function deleteAction(Request $request, competitor $competitor) {
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
    private function createDeleteForm(competitor $competitor) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('competitor_delete', array('id' => $competitor->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
