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
     * @Template("AppBundle:Afspraken:bookAfspraak.html.twig")
     */
    public function bookAfspraakAction()
    {
    	$afspraak = new Afspraak();
	$f
    }

}
