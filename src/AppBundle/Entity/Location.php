<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
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
     * @ORM\Column(name="LokaalNummer", type="integer")
     */
    private $lokaalNummer;


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
}

