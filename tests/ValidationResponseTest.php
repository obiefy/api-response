<?php

namespace Obiefy\API\Tests;

class ValidationResponseTest extends TestCase
{
    /** @test */
    public function it_returns_validation_failed_response()
    {
        $response = api()->validation()->getContent();
        $expectedResponse = [
            'MESSAGE' => 'Validation Failed please check the request attributes and try again.',
            'STATUS'  => 422,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_validation_failed_response_with_passed_data()
    {
        $response = api()->validation('Name field is required, please check and try again.', ['name' => 'name field is required'])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'Name field is required, please check and try again.',
            'STATUS'  => 422,
            'DATA'    => ['name' => 'name field is required'],
        ];

        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_validation_response_with_default_data()
    {
        $response = api()->validation()->getContent();
        $expectedResponse = [
            'STATUS'  => 422,
            'MESSAGE' => config('api.messages.validation'),
            'DATA'    => [],
        ];

        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }
}
