<?php

namespace AppBundle\Controller;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use AppBundle\Entity\ProfileImage;
use Proxies\__CG__\AppBundle\Entity\Patient;
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

        $form->add('captcha', CaptchaType::class, array(
            'width' => 200,
            'height' => 50,
            'length' => 6,
        ));

        $form->add('submit', SubmitType::class, array(
            'label' => 'Register',
            'attr' => array('class' => 'btn btn-lg btn-primary')
        ));

        //validate the form
        $form->handleRequest($request);

        if ('POST' === $request->getMethod()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $this->get('app_bundle.user_manager')
                    ->setUserPassword($user, $user->getPassword());
                $user->setRoles(array('ROLE_PATIENT'));

                $image = new ProfileImage();
                $image->setPath('defaultProfileImage.png');

                $em->persist($image);
                $em->flush();

                $user->setImage($image);
                $em->persist($user);
                $em->flush();

                $patient = new Patient();
                $patient->setUser($user);
                $em->persist($patient);
                $em->flush();

                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'You are registered, please log in');

                $message = \Swift_Message::newInstance()
                    ->setSubject('Registration confirmation')
                    ->setFrom('dendokteur@gmail.com')
                    ->setTo("dendokteur@gmail.com")
                    ->setContentType('text/html')
                    ->setBody(
                        $this->renderView(
                            'AppBundle:emails:registration.html.twig',
                            array(
                                'name' => $user->getUsername()
                            ),
                            'text/html')
                    );
                // send email
                $this->get('mailer')->send($message);

                return $this->redirect($this->generateUrl('login_route'));
            }
            return array('user' => $user, 'form' => $form->createView());
        }
        return array('user' => $user, 'form' => $form->createView());

    }
}
