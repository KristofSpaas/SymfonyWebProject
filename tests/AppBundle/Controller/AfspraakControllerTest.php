<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AfspraakControllerTest extends WebTestCase
{
    public function testShowafspraken()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'patient@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/showAfspraken');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Welcome! Please pick an appointment")')->count()
        );
    }

    public function testAddafspraak()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'doctor@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/addAfspraak');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Add appointment")')->count()
        );
    }

    public function testNotFound() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $client->request('GET', 'afspraak/notfoundurl');

        $this->assertTrue($client->getResponse()->isNotFound());
    }
}
