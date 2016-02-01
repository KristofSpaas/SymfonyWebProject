<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PatientControllerTest extends WebTestCase
{
    public function testShowpatients()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/patient/showPatients');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Patients")')->count()
        );
    }

    public function testEditpatient()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/patient/1/editPatient');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Edit Patient")')->count()
        );
    }

    public function testPatientdetail()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/patient/3');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Patient Patient")')->count()
        );
    }

    public function testAddpatient()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/patient/addPatient');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Add Patient")')->count()
        );
    }

    public function testNotFound() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', 'patient/notfoundurl');

        $this->assertTrue($client->getResponse()->isNotFound());
    }

}
