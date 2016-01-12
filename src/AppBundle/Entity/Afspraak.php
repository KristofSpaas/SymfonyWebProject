<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afspraak
 *
 * @ORM\Table(name="afspraken")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AfsprakenRepository")
 */
class Afspraak
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
     * @var Doctor
     *
     *  ORM\Column(name="doctorId", type="integer")
     * @ORM\ManyToOne(targetEntity="Doctor")
     * ORM\JoinColumn(name="doctorid", referencedColumnName="id")
     */
    private $doctor;

    /**
     * @var Patient
     *
     *  ORM\Column(name="patientId", type="integer")
     * @ORM\ManyToOne(targetEntity="Patient")
     * ORM\JoinColumn(name="patientid", referencedColumnName="id")
     */
    private $patient;

    /**
     * @var bool
     *
     * @ORM\Column(name="bezet", type="boolean")
     */
    private $bezet;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
     * Set doctorId
     *
     * @param integer $doctorId
     *
     * @return Afspraken
     */
    public function setDoctor($doctorId)
    {
        $this->doctor = $doctorId;

        return $this;
    }

    /**
     * Get doctorId
     *
     * @return int
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set patientId
     *
     * @param integer $patientId
     *
     * @return Afspraken
     */
    public function setPatient($patientId)
    {
        $this->patient = $patientId;

        return $this;
    }

    /**
     * Get patientId
     *
     * @return int
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Afspraken
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set bezet
     *
     * @param boolean $bezet
     *
     * @return Afspraken
     */
    public function setBezet($bezet)
    {
        $this->bezet = $bezet;

        return $this;
    }

    /**
     * Get bezet
     *
     * @return bool
     */
    public function getBezet()
    {
        return $this->bezet;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Afspraken
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}

