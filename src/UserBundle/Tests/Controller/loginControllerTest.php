<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class loginControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
    }

}
