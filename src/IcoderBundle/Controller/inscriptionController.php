<?php

namespace IcoderBundle\Controller;

use IcoderBundle\Entity\inscription;
use IcoderBundle\Entity\team;
use IcoderBundle\Entity\edition;
use IcoderBundle\Entity\user;
use IcoderBundle\Entity\canton;
use IcoderBundle\Entity\competitor;
use IcoderBundle\Entity\SportTest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Inscription controller.
 *
 */
class inscriptionController extends Controller {

    /**
     * Lists all inscription entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $inscriptions = $em->getRepository('IcoderBundle:inscription')->findAll();

        return $this->render('IcoderBundle:inscription:index.html.twig', array(
                    'inscriptions' => $inscriptions,
        ));
    }

    /**
     * Metodo para seleccionar el canton a inscuribir
     * @param Request $request
     * @return type
     */
    public function addAction(Request $request) {

        $search = $request->request->get("search", null);

        $em = $this->getDoctrine()->getManager();
        $cantons = null;

        if ($search) {
            $query = $em->createQuery("SELECT canton FROM IcoderBundle:canton canton WHERE canton.name LIKE :fname");
            $query->setParameter('fname', '%' . $search . '%');
            $cantons = $query->getResult();
        } else {
            $cantons = $em->getRepository('IcoderBundle:canton')->findAll();
        }


        return $this->render('IcoderBundle:inscription:selectCanton.html.twig', array(
                    'cantons' => $cantons,
                    'search' => $search,
        ));
    }

    /**
     * metodo para seleccionar el SportTest a inscribir
     * @param Request $request
     * @param canton $canton
     * @return type
     */
    public function addTestAction(Request $request, canton $canton) {

        $search = $request->request->get("search", null);

        $em = $this->getDoctrine()->getManager();
        $tests = null;

        if ($search) {
            $dql = "SELECT test FROM IcoderBundle:SportTest test" .
                    " WHERE test.name LIKE :fname and test.category.active = true";
            $query = $em->createQuery($dql);
            $query->setParameter('fname', '%' . $search . '%');
            $tests = $query->getResult();
        } else {
            $tests = $em->getRepository('IcoderBundle:SportTest')->findAll();
        }


        return $this->render('IcoderBundle:inscription:selectTest.html.twig', array(
                    'tests' => $tests,
                    'search' => $search,
                    'canton' => $canton,
        ));
    }

    /**
     * valida y crea las inscripciones agregando el equipo por defecto
     * 
     * @param Request $request
     * @param canton $canton
     * @param SportTest $test
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction(Request $request, canton $canton, SportTest $test) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('IcoderBundle:edition');
        $edition = $repository->findOneByActive(true);

        $teamName = $canton->getName() . '-' . $test . '-' . $edition->getYear()->format('Y');
        $team = $em->getRepository('IcoderBundle:team')->findOneByName($teamName);

        $flag = is_null($team);

        if ($flag) {
            $team = new team();
            $team->setName($teamName);
            $team->setSportTest($test);

            $em->persist($team);
            $em->flush();
        }

        $inscription = null;
        if ($flag) {
            $inscription = new Inscription();
            $inscription->setRegister(new \DateTime("now"));
            $inscription->setUser($this->getUser());
            $inscription->setEdition($edition);
            $inscription->setTeam($team);

            $em = $this->getDoctrine()->getManager();
            $em->persist($inscription);
            $em->flush();
        } else {
            $inscription = $em->getRepository('IcoderBundle:inscription')
                    ->findOneBy(array(
                'team' => $team,
                'edition' => $edition,
                'user' => $this->getUser()
            ));
        }

        return $this->redirectToRoute('inscription_show', array(
                    'id' => $inscription->getID(),
        ));
    }

    /**
     * Busca carga una inscripcion, es punto de partida 
     * para inscribir competidores
     *
     */
    public function showAction(inscription $inscription, canton $canton) {
        //bandera para no se pueden hacer cambios
        if ($inscription->getEdition()->getEnd() > new \DateTime("now")) {
            $inscription->getEdition()->setActive(FALSE);
            $this->getDoctrine()->getManager()->flush();
        }
        
        $competitors = $inscription->getTeam()->getCompetitors();
        return $this->render('IcoderBundle:inscription:show.html.twig', array(
                    'inscription' => $inscription,
                    'competitors' => $competitors,
                    'canton' => $canton,
        ));
    }

    /**
     * Displays a form to edit an existing inscription entity.
     *
     */
    public function editAction(Request $request, inscription $inscription) {
        $deleteForm = $this->createDeleteForm($inscription);
        $editForm = $this->createForm('IcoderBundle\Form\inscriptionType', $inscription);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inscription_edit', array('id' => $inscription->getId()));
        }

        return $this->render('IcoderBundle:inscription:edit.html.twig', array(
                    'inscription' => $inscription,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inscription entity.
     *
     */
    public function deleteAction(Request $request, inscription $inscription) {
        $form = $this->createDeleteForm($inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inscription);
            $em->flush();
        }

        return $this->redirectToRoute('inscription_index');
    }

    /**
     * Creates a form to delete a inscription entity.
     *
     * @param inscription $inscription The inscription entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(inscription $inscription) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('inscription_delete', array('id' => $inscription->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
