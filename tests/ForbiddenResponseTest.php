<?php

namespace Obiefy\API\Tests;

class ForbiddenResponseTest extends TestCase
{
    /** @test */
    public function it_returns_forbidden_with_default_response()
    {
        $response = api()->forbidden()->getContent();
        $expectedResponse = [
            'STATUS'  => 403,
            'MESSAGE' => config('api.messages.forbidden'),
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_forbidden_with_passed_parameters()
    {
        $response = api()
            ->forbidden('No access.', ['reference_code' => 345])
            ->getContent();
        $expectedResponse = [
            'STATUS'  => 403,
            'MESSAGE' => 'No access.',
            'DATA'    => ['reference_code' => 345],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }
}
