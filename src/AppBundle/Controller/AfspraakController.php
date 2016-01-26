<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Afspraak;
use AppBundle\Form\AfspraakType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AfspraakController extends Controller
{
    /**
     * @Route("/showAfspraken", name="showAfspraken")
     */
    public function showAfsprakenAction()
    {
        $appointments = [];
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        return $this->render('AppBundle:Afspraak:showAfspraken.html.twig', array( 'days' => $days
        ));
    }

    /**
     * @Route("/addAfspraak/{id}", name="addAfspraak")
     * @method({"GET", "POST"}
     */
    public function addAfspraakAction( Request $request, $id )
    {
        $em = $this->getDoctrine()->getManager();
        $doctor = $em->getRepository("AppBundle:Doctor")->find($id);
        //dump($doctors);
        $user= $this->get('security.token_storage')->getToken()->getUser();
        $patients = $em->getRepository("AppBundle:Patient")->findAll();
        dump($patients);
        $patientOut=1;
        foreach($patients as $patient){
            if($patient->getUser() == $user){
                $patientOut = $patient;
                break;
            }
        }
        dump($patient);

        if($user != "anon."){
            $roles = $user->getRoles();
            dump($user);
            dump($id);
        }else{
            echo("ERROR ");
        }
        $afspraak = new Afspraak();
        $form = $this->createForm(AfspraakType::class, $afspraak);
        $form->handleRequest($request);

        // dump($roles);
        if($form->isSubmitted() && $form->isValid()){
            $afspraak->setDoctor($doctor);
            $afspraak->setPatient($patient);
            $afspraak->setBezet("true");

            $em->persist($afspraak);
            $em->flush();

            $message = \Swift_Message::newInstance()
                     ->setSubject("Appointment on dendokteur")
                     ->setFrom("dendokteur@gmail.com")
                     ->setTo($user->getEmail())
                     ->setContentType('text/html')
                     ->setBody( $this->renderView( 'AppBundle:emails:afspraak.html.twig', array( 'afspraak' => $afspraak)), 'text/html');
            // TODO: Uncomment this to enable emails
            // $this->get('mailer')->send($message);

            return $this->redirectToRoute('showAfspraken');
        }

        return $this->render('AppBundle:Afspraak:addAfspraak.html.twig', array(
            'afspraak' => $afspraak,
            'form' => $form->createView(),
        ));
    }

}
