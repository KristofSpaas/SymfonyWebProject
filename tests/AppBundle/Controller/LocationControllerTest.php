<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LocationControllerTest extends WebTestCase
{
    public function testShowlocations()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', 'location/showLocations');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Locations")')->count()
        );
    }

    public function testAddlocation()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', 'location/addLocation');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Add Location")')->count());
    }

    public function testAdddoctortolocation()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', 'location/addDoctorToLocation/1');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Add Doctor to Location")')->count());
    }

    public function testNotFound() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $client->request('GET', 'location/notfoundurl');

        $this->assertTrue($client->getResponse()->isNotFound());
    }

}
