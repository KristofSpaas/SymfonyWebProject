<?php

namespace AppBundle\Controller;

use AppBundle\Form\EditUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ProfileImage;


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

        $editForm = $this->createForm(EditUserType::class, $user);
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

    /**
     * @Template()
     * @Route("/upload", name="profile_upload")
     * @Method({"GET", "POST"})
     */
    public function uploadAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $profileImage = new ProfileImage();
        $form = $this->createFormBuilder($profileImage)
            ->add('file')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid() && $profileImage->getPath()!=null) {
            $em = $this->getDoctrine()->getManager();

            $user->setImage($profileImage);

            $em->persist($profileImage);
            $em->persist($user);

            $em->flush();

            return $this->redirectToRoute('profile');
        }

        return array('form' => $form->createView());
    }

}