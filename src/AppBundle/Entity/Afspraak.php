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
     * @var int
     *
     *  ORM\Column(name="dokterId", type="integer")
     * @ORM\ManyToOne(targetEntity="User",inversedBy="users")
     * @ORM\JoinColumn(name="dokterid", referencedColumnName="id")
     */
    private $dokterId;

    /**
     * @var int
     *
     *  ORM\Column(name="patientId", type="integer")
     * @ORM\ManyToOne(targetEntity="User",inversedBy="users")
     * @ORM\JoinColumn(name="patientid", referencedColumnName="id")
     */
    private $patientId;

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
     * Set dokterId
     *
     * @param integer $dokterId
     *
     * @return Afspraken
     */
    public function setDokterId($dokterId)
    {
        $this->dokterId = $dokterId;

        return $this;
    }

    /**
     * Get dokterId
     *
     * @return int
     */
    public function getDokterId()
    {
        return $this->dokterId;
    }

    /**
     * Set patientId
     *
     * @param integer $patientId
     *
     * @return Afspraken
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;

        return $this;
    }

    /**
     * Get patientId
     *
     * @return int
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * Set lokaal
     *
     * @param string $lokaal
     *
     * @return Afspraken
     */
    public function setLokaal($lokaal)
    {
        $this->lokaal = $lokaal;

        return $this;
    }

    /**
     * Get lokaal
     *
     * @return string
     */
    public function getLokaal()
    {
        return $this->lokaal;
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
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}

