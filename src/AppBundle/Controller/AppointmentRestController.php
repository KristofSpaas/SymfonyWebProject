<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Afspraak;
use FOS\RestBundle\Controller\FOSRestController;


class AppointmentRestController extends FOSRestController
{

    public function getAppointmentAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $response = [];

        $appointments = $em->getRepository('AppBundle:Afspraak')->findByDoctor($id);
        $location =  $em->getRepository('AppBundle:Location')->findByDoctor($id);
        $location = $location[0]->getLokaalNummer();

        foreach ($appointments as $appointment){
            $date = $appointment->getDate();
            $doctor = $appointment->getDoctor()->getUser()->getLastname();
            $patientFirstName = $appointment->getPatient()->getUser()->getFirstname();
            $patientLastName = $appointment->getPatient()->getUser()->getLastname();
            $symptoms = $appointment->getComment();

            $data = array(
                'date'=>$date,
                'doctor'=>$doctor,
                'location'=>$location,
                'patientFirstName'=>$patientFirstName,
                'patientLastName'=>$patientLastName,
                'symptoms'=>$symptoms
            );

            array_push($response, $data);
        }


        return $response;
    }

}
