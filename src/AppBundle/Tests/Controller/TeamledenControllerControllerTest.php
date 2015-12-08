<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamledenControllerControllerTest extends WebTestCase
{
    public function testShowteamleden()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showTeamleden');
    }

}
