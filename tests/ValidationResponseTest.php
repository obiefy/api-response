<?php


namespace Obiefy\API\Tests;


class ValidationResponseTest extends TestCase {

    /** @test */
    public function it_returns_validation_failed_response()
    {
        $response = api()->validation()->getContent();
        $expectedResponse = [
            'MESSAGE' => 'Validation Failed please check the request attributes and try again.',
            'STATUS' => 402,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_validation_failed_response_with_passed_data()
    {
        $response = api()->validation(['name' => 'name field is required'])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'Validation Failed please check the request attributes and try again.',
            'STATUS' => 402,
            "DATA" => ['name' => 'name field is required']
        ];

        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }
}