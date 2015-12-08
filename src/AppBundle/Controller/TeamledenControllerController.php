<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TeamledenControllerController extends Controller
{
    /**
     * @Route("/showTeamleden")
     */
    public function showTeamledenAction()
    {
        return $this->render('AppBundle:TeamledenController:showTeamleden.html.twig', array(
            // ...
        ));
    }

}
