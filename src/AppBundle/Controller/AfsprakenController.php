<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Afspraak;

class AfsprakenController extends Controller
{
    /**
     * @Route("/showAfspraken")
     * Template("AppBundle:Afspraken:showAfspraken.html.twig")
     */
    public function showAfsprakenAction()
    {
        return $this->render('AppBundle:Afspraken:showAfspraken.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/bookAfspraak")
     *  Template("AppBundle:Afspraken:bookAfspraak.html.twig")
     * @method({"GET", "POST"})
     */
    public function bookAfspraakAction(Request $request)
    {
    	$afspraak = new Afspraak();
	$form = $this->createForm(AfspraakType::class, $afspraak);
	$form->handleRequest($request);

	if($form->isSubmitted() && $form->isValid()){
		$em = $this->getDoctrine()->getManager();
		
		return $this->redirectToRoute('showAfspraken', array(id => $user->getId()));
	}

	return $this->redirectToRoute('showAfspraken', array('user' => $user, 'form' => $form->createView() ));
    }

}
