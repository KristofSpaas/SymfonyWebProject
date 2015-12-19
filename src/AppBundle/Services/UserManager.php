<?php

namespace AppBundle\Services;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class UserManager
{
    private $encoderFactory;

    /**
     * UserManager constructor.
     * @param EncoderFactory $encoderFactory
     */
    public function __construct(EncoderFactory $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function setUserPassword(UserInterface $user, $sPasswordToEncode)
    {
        //encode the given password
        $hashedPassword = $this->encoderFactory->getEncoder($user)->encodePassword($sPasswordToEncode,$user->getSalt());

        $user->setPassword($hashedPassword);
    }
}