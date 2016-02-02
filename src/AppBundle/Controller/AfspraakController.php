<?php

namespace AppBundle\Controller;

use AppBundle\Form\BookAfspraakType;
use AppBundle\Form\CreateAfspraakType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Afspraak;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AfspraakController extends Controller
{
    /**
     * @Route("/showAfspraken", name="showAfspraken")
     * @Method({"GET", "POST"})
     */
    public function showAfsprakenAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(BookAfspraakType::class);
        $form->handleRequest($request);

        $usr = $this->get('security.token_storage')->getToken()->getUser();

        $query = $em->getRepository('AppBundle:Patient')->createQueryBuilder('p')
            ->where('p.user = :id')
            ->setParameter('id', $usr)
            ->getQuery();

        $patient = $query->setMaxResults(1)->getOneOrNullResult();

        $afspraken = $em->getRepository("AppBundle:Afspraak")->findAll();
        $hours = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00',
            '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];

        $datesOriginal = [];
        $datesFormatted = [];

        $date = new DateTime();
        for ($i = 0; $i < 7; $i++) {
            $datesOriginal[$i] = new DateTime(date_format($date, 'Y-m-d'));
            $datesFormatted[$i] = date_format($date, 'D d/m');
            $date->modify('+1 day');
        }

        $afsprakenByDate = [];
        for ($i = 0; $i < count($hours); $i++) {
            for ($j = 0; $j < count($datesOriginal); $j++) {
                $afsprakenByDate[$i][$j] = null;

                foreach ($afspraken as $afspraak) {
                    $afspraakDate = $afspraak->getDate();
                    $dateSlot = new DateTime(date_format($datesOriginal[$j], 'Y-m-d') . " " . $hours[$i]);
                    if ($afspraakDate == $dateSlot) {
                        $afsprakenByDate[$i][$j] = $afspraak;
                        break;
                    }
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $symptoms = $form["symptoms"]->getData();
            $rowId = $form["row"]->getData();
            $colId = $form["col"]->getData();

            $afspraak = $afsprakenByDate[$rowId][$colId];

            $afspraak->setPatient($patient);
            $afspraak->setBezet(true);
            $afspraak->setComment($symptoms);

            $em->persist($afspraak);
            $em->flush();

            return $this->redirectToRoute('showAfspraken');
        }

        return $this->render('AppBundle:Afspraak:showAfspraken.html.twig', array(
            'afspraken' => $afsprakenByDate,
            'days' => $datesFormatted,
            'hours' => $hours,
            'patientId' => $patient->getId(),
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/addAfspraak", name="addAfspraak")
     * @Method({"GET", "POST"})
     */
    public function addAfspraakAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CreateAfspraakType::class);
        $form->handleRequest($request);

        $usr = $this->get('security.token_storage')->getToken()->getUser();

        $query = $em->getRepository('AppBundle:Doctor')->createQueryBuilder('d')
            ->where('d.user = :id')
            ->setParameter('id', $usr)
            ->getQuery();

        $doctor = $query->setMaxResults(1)->getOneOrNullResult();

        $afspraken = $em->getRepository("AppBundle:Afspraak")->findAll();
        $hours = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00',
            '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];

        $datesOriginal = [];
        $datesFormatted = [];

        $date = new DateTime();
        for ($i = 0; $i < 7; $i++) {
            $datesOriginal[$i] = new DateTime(date_format($date, 'Y-m-d'));
            $datesFormatted[$i] = date_format($date, 'D d/m');
            $date->modify('+1 day');
        }

        $afsprakenByDate = [];
        for ($i = 0; $i < count($hours); $i++) {
            for ($j = 0; $j < count($datesOriginal); $j++) {
                $afsprakenByDate[$i][$j] = null;

                foreach ($afspraken as $afspraak) {
                    $afspraakDate = $afspraak->getDate();
                    $dateSlot = new DateTime(date_format($datesOriginal[$j], 'Y-m-d') . " " . $hours[$i]);
                    if ($afspraakDate == $dateSlot) {
                        $afsprakenByDate[$i][$j] = $afspraak;
                        break;
                    }
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $afspraak = new Afspraak();
            $afspraak->setBezet(false);
            $afspraak->setComment("");
            $afspraak->setPatient(null);
            $afspraak->setDoctor($doctor);

            $day = $form["day"]->getData();
            $hour = $form["hour"]->getData();

            $newDate = date_format($datesOriginal[$day], 'Y-m-d');

            $newDateWithHour = new DateTime($newDate . " " . $hours[$hour]);

            $afspraak->setDate($newDateWithHour);

            $em->persist($afspraak);
            $em->flush();

            return $this->redirectToRoute('addAfspraak');
        }

        return $this->render('AppBundle:Afspraak:addAfspraak.html.twig', array(
            'afspraken' => $afsprakenByDate,
            'days' => $datesFormatted,
            'hours' => $hours,
            'form' => $form->createView(),
            'doctorId' => $doctor->getId()
        ));
    }

    /**
     * @Route("/unBookAfspraak/{id}", name="unBookAfspraak")
     * @Method({"GET", "POST"})
     */
    public function unBookAfspraakAction(Request $request, Afspraak $afspraak)
    {
        $em = $this->getDoctrine()->getManager();

        $afspraak->setPatient(null);
        $afspraak->setBezet(false);
        $afspraak->setComment("");

        $em->persist($afspraak);
        $em->flush();

        return $this->redirectToRoute('showAfspraken');
    }

    /**
     * @Route("/deleteAfspraak/{id}", name="deleteAfspraak")
     * @Method({"GET"})
     */
    public function deleteAfspraakAction(Request $request, Afspraak $afspraak)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($afspraak);
        $em->flush();

        return $this->redirectToRoute('addAfspraak');
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
