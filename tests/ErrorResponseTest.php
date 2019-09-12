<?php

namespace Obiefy\API\Tests;

class ErrorResponseTest extends TestCase
{
    /** @test */
    public function it_returns_error_with_default_response()
    {
        $response = api()->error()->getContent();
        $expectedResponse = [
            'STATUS'  => 500,
            'MESSAGE' => config('api.messages.error'),
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_error_with_passed_parameters()
    {
        $response = api()
            ->error('error Accord, try later.', ['reference_code' => 345])
            ->getContent();
        $expectedResponse = [
            'STATUS'  => 500,
            'MESSAGE' => 'error Accord, try later.',
            'DATA'    => ['reference_code' => 345],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }
}
