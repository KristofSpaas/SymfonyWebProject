<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
 * @UniqueEntity("lokaalNummer", message="That room number is already taken")
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="lokaalNummer", type="integer")
     * @Assert\NotBlank(message="You must enter a room number")
     * @Assert\Type(type="integer", message="Room number has to be a number")
     */
    private $lokaalNummer;

    /**
     * @var Doctor
     * @ORM\OneToOne(targetEntity="Doctor", inversedBy="location")
     * @ORM\JoinColumn(name="locationId", referencedColumnName="id")
     */
    private $doctor;

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
     * Set lokaalNummer
     *
     * @param integer $lokaalNummer
     *
     * @return Location
     */
    public function setLokaalNummer($lokaalNummer)
    {
        $this->lokaalNummer = $lokaalNummer;

        return $this;
    }

    /**
     * Get lokaalNummer
     *
     * @return int
     */
    public function getLokaalNummer()
    {
        return $this->lokaalNummer;
    }

    /**
     * Set doctor
     *
     * @param Doctor $doctor
     * @return Location
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

}

