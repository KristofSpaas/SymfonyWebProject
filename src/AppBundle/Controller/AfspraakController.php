<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Afspraak;
use AppBundle\Form\AfspraakType;

/**
 * Afspraak controller.
 *
 */
class AfspraakController extends Controller
{
    /**
     * Lists all Afspraak entities.
     *
     * @Route("/showAfspraak", name="showAfspraak")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $afspraaks = $em->getRepository('AppBundle:Afspraak')->findAll();

        return $this->render('afspraak/index.html.twig', array(
            'afspraaks' => $afspraaks,
        ));
    }

    /**
     * Creates a new Afspraak entity.
     *
     * @Route("/addAfspraak", name="addAfspraak")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $afspraak = new Afspraak();
        $form = $this->createForm(new AfspraakType(), $afspraak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($afspraak);
            $em->flush();

            return $this->redirectToRoute('afspraak_show', array('id' => $afspraak->getId()));
        }

        return $this->render('afspraak/new.html.twig', array(
            'afspraak' => $afspraak,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Afspraak entity.
     *
     * @Route("/getAfspraak/{id}", name="getAfspraak")
     * @Method("GET")
     */
    public function showAction(Afspraak $afspraak)
    {
        $deleteForm = $this->createDeleteForm($afspraak);

        return $this->render('afspraak/show.html.twig', array(
            'afspraak' => $afspraak,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Afspraak entity.
     *
     * @Route("/{id}/edit", name="editAfspraak")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Afspraak $afspraak)
    {
        $deleteForm = $this->createDeleteForm($afspraak);
        $editForm = $this->createForm(new AfspraakType(), $afspraak);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($afspraak);
            $em->flush();

            return $this->redirectToRoute('afspraak_edit', array('id' => $afspraak->getId()));
        }

        return $this->render('afspraak/edit.html.twig', array(
            'afspraak' => $afspraak,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Afspraak entity.
     *
     * @Route("/{id}", name="deleteAfspraak")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Afspraak $afspraak)
    {
        $form = $this->createDeleteForm($afspraak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($afspraak);
            $em->flush();
        }

        return $this->redirectToRoute('afspraak_index');
    }

    /**
     * Creates a form to delete a Afspraak entity.
     *
     * @param Afspraak $afspraak The Afspraak entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Afspraak $afspraak)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('afspraak_delete', array('id' => $afspraak->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
