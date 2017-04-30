<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article');
    }

    public function testDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/artcile/{id}');
    }

}
