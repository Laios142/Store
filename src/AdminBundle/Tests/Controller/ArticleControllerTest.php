<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/new');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/delete/{id}');
    }

}
