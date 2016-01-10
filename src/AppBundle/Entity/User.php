<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity("email",message="That email is already taken")
 * @UniqueEntity("username",message="That username is already taken")

 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=80)
     * @Assert\NotBlank(message="You must have a username")
     * @Assert\Regex("/^[A-Za-z0-9_.\-]+$/"),message="Username must be only letters and/or
     *  numbers with optional periods, dashes and underscores")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=80)
     * @Assert\NotBlank(message="First Name is required")
     * @Assert\Regex("/^[A-Za-z\-'']+$/"),message="First name must be only letters
     *  optional dashes and apostophres")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=80)
     * @Assert\NotBlank(message="Last Name is required")
     * @Assert\Regex("/^[A-Za-z\-'']+$/"),message="Last name must be only letters
     *  optional dashes and apostophres")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80)
     * @Assert\NotBlank(message="Email is required")
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80)
     * @Assert\NotBlank(message="Password is required")
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="location", type="integer", nullable=true)
     */
    private $location = null;

    /**
     * @return null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set location
     *
     * @param int $location
     *
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    public function eraseCredentials()
    {

    }

    public function getRoles()
    {
        $roles=$this->roles;
        $roles[]='ROLE_PATIENT';
        return array_unique($roles);
    }

    /**
     * @param roles[]
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getFullName()
    {
        return $this->getFirstname()." ".$this->getLastname();
    }
}

