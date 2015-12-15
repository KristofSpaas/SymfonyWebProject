<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AfsprakenControllerTest extends WebTestCase
{
    public function testShowafspraken()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAfspraken');
    }

    public function testBookafspraak()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/bookAfspraak');
    }

}
