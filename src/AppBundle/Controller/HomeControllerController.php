<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeControllerController extends Controller
{
    /**
     * @Route("/showHome")
     */
    public function showHomeAction()
    {
        return $this->render('AppBundle:HomeController:showHome.html.twig', array(
            // ...
        ));
    }

}
