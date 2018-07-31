<?php

namespace Tests\Peru\Http;

use Peru\Http\ContextClient;

class ContextClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $client = new ContextClient();
        $result = $client->get('https://httpbin.org/get?value=1');

        $obj = json_decode($result);

        $this->assertTrue(isset($obj->args->value));
    }

    public function testPost()
    {
        $client = new ContextClient();
        $result = $client->post('https://httpbin.org/post', [
            'value' => 1,
        ]);

        $obj = json_decode($result);

        $this->assertTrue(isset($obj->form->value));
    }
}