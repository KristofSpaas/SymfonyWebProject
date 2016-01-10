<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LocationControllerTest extends WebTestCase
{
    public function testShowlocations()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showLocations');
    }

    public function testAddlocation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addLocation');
    }

    public function testDeletelocation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteLocation');
    }

    public function testAdddoctortolocation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addDoctorToLocation');
    }

}
