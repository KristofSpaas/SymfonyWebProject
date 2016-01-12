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
     * @Route("/showAfspraken")
     */
    public function showAfsprakenAction()
    {
        return $this->render('AppBundle:Afspraak:showAfspraken.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/addAfspraak")
     * @method({"GET", "POST"}
     */
    public function addAfspraakAction( Request $request )
    {
    	$em = $this->getDoctrine()->getManager();
	$doctors = $em->getRepository("AppBundle:Doctor")->findAll();
	$patients = $em->getRepository("AppBundle:Patient")->findAll();
	
	$afspraak = new Afspraak();
	$form = $this->createForm(AfspraakType::class, $afspraak);
	$form->handleRequest($request);

	if($form->isSubmitted() && $form->isValid()){

		return $this-redirectToRoute('showAfspraken');
		}

        return $this->render('AppBundle:Afspraak:addAfspraak.html.twig', array(
	'afspraak' => $afspraak,
	'form' => $form->createView(),
	));
    }

}
