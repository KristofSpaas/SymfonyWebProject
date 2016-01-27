<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Please Login")')->count()
        );
    }

    public function testNotFound() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'kris.s@g.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $crawler = $client->request('GET', '/login/notfoundurl');

        $this->assertTrue($client->getResponse()->isNotFound());
    }
}
