<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;

/**
 * Profile controller.
 *
 * @Route("/profile", name="profile")
 */
class ProfileController extends Controller
{
    /**
     * Shows User profile.
     *
     * @Route("/", name="profile")
     * @Method("GET")
     */
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('AppBundle:Profile:index.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Displays a form to edit an User profile.
     *
     * @Route("/edit", name="profile_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //add role based on value off checkbox
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('AppBundle:Profile:edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
        ));
    }
}