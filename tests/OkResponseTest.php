<?php
namespace Obiefy\Tests;
use Obiefy\API\Facades\API;
use Obiefy\API\Tests\TestCase;

class OkResponseTest extends TestCase{


    /** @test */
    public function it_returns_ok_response()
    {
        $response = API::ok('this is message', [])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'this is message',
            'STATUS' => 200,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_ok_response_from_helper_function()
    {
        $response = api()->ok('this is message', [])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'this is message',
            'STATUS' => 200,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_ok_response_with_default_message()
    {
        $response = api()->ok()->getContent();
        $expectedResponse = [
            'MESSAGE' => config('api.messages.200'),
            'STATUS' => 200,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    

}