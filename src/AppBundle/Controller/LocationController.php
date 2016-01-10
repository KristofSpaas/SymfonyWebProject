<?php

namespace AppBundle\Controller;

use AppBundle\Form\DoctorLocationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Location;
use AppBundle\Form\LocationType;


/**
 * Location controller.
 *
 * @Route("/location", name="location")
 */
class LocationController extends Controller
{
    /**
     * @Route("/showLocations", name="showLocations")
     */
    public function showLocationsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locations = $em->getRepository('AppBundle:Location')->findAll();

        $locationsWithUser = array();

        foreach ($locations as $location) {
            $query = $em->getRepository('AppBundle:User')->createQueryBuilder('u')
                ->where('u.location = :location')
                ->setParameter('location', $location->getId())
                ->getQuery();

            $userForLocation = $query->setMaxResults(1)->getOneOrNullResult();

            $locationWithUser = (object)['id' => $location->getId(),
                'lokaalnummer' => $location->getLokaalNummer(),
                'user' => $userForLocation
            ];

            array_push($locationsWithUser, $locationWithUser);
        }

        return $this->render('AppBundle:Location:showLocations.html.twig', array(
            'locations' => $locationsWithUser,
        ));
    }

    /**
     * Creates a new Location entity.
     *
     * @Route("/addLocation", name="addLocation")
     * @Method({"GET", "POST"})
     */
    public function addLocationAction(Request $request)
    {
        $location = new Location();
        $form = $this->createForm(LocationType::class, $location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('showLocations');
        }

        return $this->render('AppBundle:Location:addLocation.html.twig', array(
            'location' => $location,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/deleteLocation/{id}", name="deleteLocation")
     */
    public function deleteLocationAction(Request $request, Location $location)
    {
        $form = $this->createDeleteForm($location);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($location);
            $em->flush();
        }

        return $this->redirectToRoute('showLocations');
    }

    /**
     * Displays a form to edit an existing Location entity.
     *
     * @Route("editLocation/{id}", name="editLocation")
     * @Method({"GET", "POST"})
     */
    public function editLocationAction(Request $request, Location $location)
    {
        $deleteForm = $this->createDeleteForm($location);
        $editForm = $this->createForm(LocationType::class, $location);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('showLocations');
        }

        return $this->render('AppBundle:Location:editLocation.html.twig', array(
            'location' => $location,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/addDoctorToLocation/{id}", name="addDoctorToLocation")
     * @Method({"GET", "POST"})
     */
    public function addDoctorToLocationAction(Request $request, Location $location)
    {
        $doctorLocationForm = $this->createForm(DoctorLocationType::class);
        $doctorLocationForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('AppBundle:User')->createQueryBuilder('u')
            ->where('u.location = :location')
            ->setParameter('location', $location->getId())
            ->getQuery();

        $currentUser = $query->setMaxResults(1)->getOneOrNullResult();

        if ($currentUser != null) {
            $currentUser->setLocation(0);
            $em->flush();
        }

        if ($doctorLocationForm->isSubmitted() && $doctorLocationForm->isValid()) {
            $doctor = $doctorLocationForm["doctors"]->getData();

            $user = $em->getRepository('AppBundle:User')->find($doctor->getId());

            $user->setLocation($location->getId());
            $em->flush();

            return $this->redirectToRoute('showLocations');
        }

        return $this->render('AppBundle:Location:addDoctorToLocation.html.twig', array(
            'location' => $location,
            'doctor_location_form' => $doctorLocationForm->createView(),
        ));
    }

    private
    function createDeleteForm(Location $location)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deleteLocation', array('id' => $location->getId())))
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
