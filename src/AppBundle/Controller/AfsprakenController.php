<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AfsprakenController extends Controller
{
    /**
     * @Route("/showAfspraken")
     */
    public function showAfsprakenAction()
    {
        return $this->render('AppBundle:Afspraken:showAfspraken.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/bookAfspraak")
     */
    public function bookAfspraakAction()
    {
        return $this->render('AppBundle:Afspraken:bookAfspraak.html.twig', array(
            // ...
        ));
    }

}
