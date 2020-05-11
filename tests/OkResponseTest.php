<?php

namespace Obiefy\Tests;

use Obiefy\API\Facades\API;
use Obiefy\API\Tests\TestCase;

class OkResponseTest extends TestCase
{
    /** @test */
    public function it_returns_ok_response()
    {
        $response = API::ok('this is message', [])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'this is message',
            'STATUS'  => 200,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_ok_response_from_helper_function()
    {
        $response = api()->ok('this is message', [])->getContent();
        $expectedResponse = [
            'MESSAGE' => 'this is message',
            'STATUS'  => 200,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_ok_response_with_default_message()
    {
        $response = api()->ok()->getContent();
        $expectedResponse = [
            'MESSAGE' => config('api.messages.success'),
            'STATUS'  => 200,
            'DATA'    => [],
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }


    /** @test */
    public function it_returns_count_if_enabled_and_countable()
    {
        config()->set('api.include_data_count', true);
        $response = api()->ok('User list', ['name1' => 'name1', 'name2' => 'name2'])->getContent();
        $this->assertEquals(true, array_key_exists('DATA_COUNT', json_decode($response)));
        $this->assertEquals(2, json_decode($response, 1)['DATA_COUNT']);
    }

    /** @test */
    public function it_does_not_return_count_if_enabled_and_not_countable()
    {
        config()->set('api.include_data_count', true);
        $response = api()->ok('User list', [])->getContent();
        $this->assertEquals(false, array_key_exists('DATA_COUNT', json_decode($response)));
    }

    /** @test */
    public function user_can_change_default_data_count_name()
    {
        config()->set('api.include_data_count', true);
        config()->set('api.keys.data_count', 'count_of_data');
        $response = api()->ok('User list', ['name1' => 'name1', 'name2' => 'name2'])->getContent();
        $this->assertEquals(true, array_key_exists('count_of_data', json_decode($response)));
    }
}
