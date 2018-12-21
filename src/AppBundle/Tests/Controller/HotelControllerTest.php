<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HotelControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'addHotel');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'updateHotel');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'deleteHotel');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'listHotel');
    }

}
