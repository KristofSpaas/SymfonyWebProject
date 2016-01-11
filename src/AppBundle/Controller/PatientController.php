<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patient;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Patient controller.
 *
 * @Route("/patient", name="patient")
 */
class PatientController extends Controller
{
    /**
     * @Route("/showPatients", name="showPatients")
     * @Method("GET")
     */
    public function showPatientsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $patients = $em->getRepository('AppBundle:Patient')->findAll();

        $users = array();

        foreach ($patients as $patient) {
            array_push($users, $patient->getUser());
        }

        return $this->render('AppBundle:Patient:showPatients.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * @Route("/addPatient", name="addPatient")
     * @Method({"GET", "POST"})
     */
    public function addPatientAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->get('app_bundle.user_manager')
                ->setUserPassword($user, $user->getPassword());

            //add role based on value off checkbox
            $user->setRoles(array('ROLE_PATIENT'));
            $em->persist($user);
            $em->flush();

            $patient = new Patient();
            $patient->setUser($user);

            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('patientDetail', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:Patient:addPatient.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="patientDetail")
     * @Method("GET")
     */
    public function patientDetailAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('AppBundle:Patient:patientDetail.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/editPatient", name="editPatient")
     * @Method({"GET", "POST"})
     */
    public function editPatientAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //add role based on value off checkbox
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('patientDetail', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:Patient:editPatient.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="deletePatient")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $query = $em->getRepository('AppBundle:Patient')->createQueryBuilder('p')
                ->where('p.user = :id')
                ->setParameter('id', $user)
                ->getQuery();

            $patient = $query->setMaxResults(1)->getOneOrNullResult();

            $em->remove($patient);
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('showPatients');
    }

    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deletePatient', array('id' => $user->getId())))
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
