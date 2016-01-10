<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Location;
use AppBundle\Form\LocationType;


class LocationController extends Controller
{
    /**
     * @Route("/showLocations", name="showLocations")
     */
    public function showLocationsAction()
    {
        $em = $this->getDoctrine()->getManager();

        //TODO: moet veranderen naar alleen maar dokters
        $locations = $em->getRepository('AppBundle:Location')->findAll();

        return $this->render('AppBundle:Location:showLocations.html.twig', array(
            'locations' => $locations,
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

            //add role based on value off checkbox
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('showLocations', array('id' => $location->getId()));
        }

        return $this->render('AppBundle:Location:editLocation.html.twig', array(
            'location' => $location,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/addDoctorToLocation/{id}", name="addDoctorToLocation")
     */
    public function addDoctorToLocationAction()
    {
        $em = $this->getDoctrine()->getManager();

        //TODO: moet veranderen naar alleen maar dokters
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('AppBundle:Location:addDoctorToLocation.html.twig', array(
            'users' => $users,
        ));
    }

    private function createDeleteForm(Location $location)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deleteLocation', array('id' => $location->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}
