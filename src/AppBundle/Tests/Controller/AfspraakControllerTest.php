<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AfspraakControllerTest extends WebTestCase
{
    public function testShowafspraken()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAfspraken');
    }

    public function testAddafspraak()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addAfspraak');
    }

}
