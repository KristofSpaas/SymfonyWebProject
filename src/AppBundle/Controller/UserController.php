<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Doctor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Utility\Paginator;

/**
 * User controller.
 *
 * @Route("/doctor", name="doctor")
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/list/{page}/{key}",defaults={"page" = 1, "key" = null}, name="doctor")
     * @Method("GET")
     */
    public function indexAction($page, $key)
    {
        $em = $this->getDoctrine()->getManager();
        $rpp = $this->container->getParameter('doctors_per_page');
        $repo = $em->getRepository('AppBundle:Doctor');
        list($res, $totalcount) = $repo->getResultAndCount($page, $rpp, $key);
        $paginator = new Paginator($page, $totalcount, $rpp);
        $pagelist = $paginator->getPagesList();


        return $this->render('AppBundle:user:index.html.twig', array(
            'doctors' => $res,
            'paginator' => $pagelist,
            'cur' => $page,
            'total' => $paginator->getTotalPages(),
            'key'=>$key));
    }

    /**
     * @Route("/search", name="doctor_search")
     * @Method({"GET","POST"})
     */
    public function searchAction(Request $request)
    {
        $q = $request->request->all();

        $page = 1;
        $key = $q['key'];

        $em = $this->getDoctrine()->getManager();
        $rpp = $this->container->getParameter('doctors_per_page');

        $repo = $em->getRepository('AppBundle:Doctor');

        list($res, $totalcount) = $repo->getResultAndCount($page, $rpp, $key);

        $paginator = new Paginator($page, $totalcount, $rpp);
        $pagelist = $paginator->getPagesList();

        return $this->render('AppBundle:user:index.html.twig', array(
            'doctors' => $res,
            'paginator' => $pagelist,
            'cur' => $page,
            'total' => $paginator->getTotalPages(),
            'key' => $key));

    }

    /**
     * @Route("/new", name="doctor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->get('app_bundle.user_manager')
                ->setUserPassword($user, $user->getPassword());

            //add role based on value off checkbox
            $user->setRoles(array('ROLE_DOCTOR'));
            $em->persist($user);
            $em->flush();

            $doctor = new Doctor();
            $doctor->setUser($user);

            $em->persist($doctor);
            $em->flush();

            return $this->redirectToRoute('doctor_show', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:user:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="doctor_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('AppBundle:user:show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="doctor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //add role based on value off checkbox
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('doctor_show', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:user:edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="doctor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $query = $em->getRepository('AppBundle:Doctor')->createQueryBuilder('d')
                ->where('d.user = :id')
                ->setParameter('id', $user)
                ->getQuery();

            $doctor = $query->setMaxResults(1)->getOneOrNullResult();

            $query2 = $em->getRepository('AppBundle:Location')->createQueryBuilder('l')
                ->where('l.doctor = :id')
                ->setParameter('id', $doctor)
                ->getQuery();

            $location = $query2->setMaxResults(1)->getOneOrNullResult();

            $location->setDoctor(null);
            $em->persist($doctor);
            $em->flush();

            $em->remove($doctor);
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('doctor');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('doctor_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    function debug_to_console($data)
    {
        if (is_array($data))
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }
}
