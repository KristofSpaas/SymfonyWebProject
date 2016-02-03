<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Doctor;
use AppBundle\Entity\ProfileImage;
use AppBundle\Utility\Paginator;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Doctor')->findAll();
        $currentDoctorId = null;

        $user = $this->get('security.token_storage')->getToken()->getUser();

        if(is_null($user)){
            $currentUserId = $user->getId();

            if($em->getRepository('AppBundle:Doctor')->findByUser($currentUserId)){
                $currentDoctor = $em->getRepository('AppBundle:Doctor')->findByUser($currentUserId);
                $currentDoctorId = $currentDoctor->getId();

            }
        }





        return $this->render('default/index.html.twig', array(
            'doctors' => $repo,
            'id' => $currentDoctorId
        ));

    }
}
