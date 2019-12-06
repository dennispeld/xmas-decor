<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class XmasControllerTest extends WebTestCase
{
    public function testGetXmasShape(): void
    {
        $client = static::createClient();

        // request to draw a tree, size M
        $client->request('GET', '/xmas/tree/M');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            '<p>Drawing a <strong>tree</strong>, size <strong>M</strong>.</p>',
            $client->getResponse()->getContent()
        );

        // request to draw a star, random size
        $client->request('GET', '/xmas/star');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            '<p>Drawing a <strong>star</strong>, size <strong>randomly selected</strong>.</p>',
            $client->getResponse()->getContent()
        );

        // request to draw a bell (which doesnt exist)
        $client->request('GET', '/xmas/bell');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            '<p>The shape \'bell\' doesn\'t exist</p>',
            $client->getResponse()->getContent()
        );
    }
}
