<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patient;
use AppBundle\Entity\User;
use AppBundle\Entity\ProfileImage;
use AppBundle\Form\EditUserType;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\Paginator;


/**
 * Patient controller.
 *
 * @Route("/patient", name="patient")
 */
class PatientController extends Controller
{
    /**
     * @Route("/showPatients/{page}/{key}", defaults={"page" = 1, "key" = null}, name="showPatients")
     * @Method("GET")
     */
    public function showPatientsAction($page, $key)
    {
        $em = $this->getDoctrine()->getManager();
        $rpp = $this->container->getParameter('patients_per_page');
        $repo = $em->getRepository('AppBundle:Patient');
        list($res, $totalcount) = $repo->getResultAndCount($page, $rpp, $key);
        $paginator = new Paginator($page, $totalcount, $rpp);
        $pagelist = $paginator->getPagesList();


        return $this->render('AppBundle:Patient:showPatients.html.twig', array(
            'patients' => $res,
            'paginator' => $pagelist,
            'cur' => $page,
            'total' => $paginator->getTotalPages(),
            'key'=>$key));
    }

    /**
     * @Route("/search", name="patient_search")
     * @Method({"GET","POST"})
     */
    public function searchAction(Request $request)
    {
        $q = $request->request->all();

        $page = 1;
        $key = $q['key'];

        $em = $this->getDoctrine()->getManager();
        $rpp = $this->container->getParameter('patients_per_page');

        $repo = $em->getRepository('AppBundle:Patient');

        list($res, $totalcount) = $repo->getResultAndCount($page, $rpp, $key);

        $paginator = new Paginator($page, $totalcount, $rpp);
        $pagelist = $paginator->getPagesList();

        return $this->render('AppBundle:Patient:showPatients.html.twig', array(
            'patients' => $res,
            'paginator' => $pagelist,
            'cur' => $page,
            'total' => $paginator->getTotalPages(),
            'key' => $key));

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

            $image = new ProfileImage();
            $image->setPath('defaultProfileImage.png');

            $em->persist($image);
            $em->flush();

            $user->setImage($image);

            $em->persist($user);
            $em->flush();

            $patient = new Patient();
            $patient->setUser($user);

            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('patientDetail', array('id' => $patient->getId()));
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
    public function patientDetailAction(Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);

        return $this->render('AppBundle:Patient:patientDetail.html.twig', array(
            'patient' => $patient,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/editPatient", name="editPatient")
     * @Method({"GET", "POST"})
     */
    public function editPatientAction(Request $request, Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);
        $editForm = $this->createForm(EditUserType::class, $patient->getUser());
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($patient->getUser());
            $em->flush();

            return $this->redirectToRoute('patientDetail', array('id' => $patient->getId()));
        }

        return $this->render('AppBundle:Patient:editPatient.html.twig', array(
            'user' => $patient->getUser(),
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
    public function deleteAction(Request $request, Patient $patient)
    {
        $form = $this->createDeleteForm($patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $query = $em->getRepository('AppBundle:Afspraak')->createQueryBuilder('a')
                ->where('a.patient = :patient')
                ->setParameter('patient', $patient)
                ->getQuery();

            $afsprakenOfPatient = $query->getResult();

            foreach($afsprakenOfPatient as $afspraak) {
                $afspraak->setPatient(null);
                $afspraak->setBezet(false);
                $afspraak->setComment("");

                $em->persist($afspraak);
            }

            $em->remove($patient);
            $em->remove($patient->getUser());
            $em->flush();
        }

        return $this->redirectToRoute('showPatients');
    }

    private function createDeleteForm(Patient $patient)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deletePatient', array('id' => $patient->getId())))
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
