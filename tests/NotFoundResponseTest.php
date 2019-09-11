<?php

namespace Obiefy\Tests;

use Obiefy\API\Facades\API;
use Obiefy\API\Tests\TestCase;

class NotFoundResponseTest extends TestCase
{
    /** @test */
    public function it_returns_404_response()
    {
        $response = api()->notFound('No results for your query')->getContent();
        $expectedResponse = [
            'MESSAGE' => 'No results for your query',
            'STATUS'  => 404,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_404_response_with_default_config_message()
    {
        $response = api()->notFound()->getContent();
        $expectedResponse = [
            'MESSAGE' => config('api.messages.notfound'),
            'STATUS'  => 404,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function user_can_change_default_notfound_status_code()
    {
        config()->set('api.codes.notfound', 406);
        $response = api()->notFound()->getContent();

        $this->assertEquals(406, json_decode($response, 1)['STATUS']);
    }
}
