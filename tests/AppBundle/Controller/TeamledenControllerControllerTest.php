<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamledenControllerControllerTest extends WebTestCase
{
    public function testShowteamleden()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/team');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Meet the team")')->count()
        );
    }

    public function testNotFound() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin@gmail.com',
            'PHP_AUTH_PW'   => 'password',
        ));

        $client->request('GET', 'team/notfoundurl');

        $this->assertTrue($client->getResponse()->isNotFound());
    }

}
