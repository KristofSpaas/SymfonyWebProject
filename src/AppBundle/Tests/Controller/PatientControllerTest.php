<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PatientControllerTest extends WebTestCase
{
    public function testShowpatients()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showPatients');
    }

    public function testEditpatient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editPatient');
    }

    public function testPatientdetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/patientDetail');
    }

    public function testRegisterpatient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registerPatient');
    }

    public function testAddpatient()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addPatient');
    }

}
