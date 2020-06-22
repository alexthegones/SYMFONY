<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function ContactPageTest()
    {
        $client = static::createClient();

        $client->request('GET', '/contact');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    
    
}