<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;



class RegisterController extends Controller
{
    /**
     * @Route("/register")
     * @Template("AppBundle:user:register.html.twig")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->remove('isAdmin');
        $form->add('submit',SubmitType::class, array(
           'label' => 'Register',
            'attr' => array('class' => 'btn btn-lg btn-primary')
        ));

        //validate the form
        $form->handleRequest($request);

        if('POST' === $request->getMethod()){
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $this->get('app_bundle.user_manager')
                    ->setUserPassword($user, $user->getPassword());
                $user->setRoles(array('ROLE_PATIENT'));
                //$user->setIsAdmin(false);
                $em->persist($user);
                $em->flush();

                $request->getSession()
                    ->getFlashBag()
                    ->add('success','You are registred, please log in');

                return $this->redirect($this->generateUrl('login_route'));
            }
            return array('user'=> $user,'form'=> $form->createView());
        }
        return array('user'=> $user,'form'=> $form->createView());

    }
}
