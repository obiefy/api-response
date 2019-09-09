<?php
namespace Obiefy\Tests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Obiefy\API\Facades\API;
use Obiefy\API\Tests\TestCase;
use phpDocumentor\Reflection\Types\Array_;

class ResponseTest extends TestCase{

    /** @test */
    public function it_returns_response_object()
    {
        $response = API::response(200, 'New Response', []);
        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    /** @test */
    public function user_can_edit_default_response_keys()
    {
        config()->set('api.keys', [
            'status' => 'newStatus',
            'message' => 'newMessage',
            'data' => 'newData'
        ]);

        $response = api()->ok()->getContent();

        $expectedResponse = [
            'newStatus' => 200,
            'newMessage' => config('api.messages.success'),
            "newData" => Array()
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returns_string_api_status_code()
    {
        $response = api()->ok()->getContent();

        $this->assertIsString(json_decode($response, 1)['STATUS']);

    }

    /** @test */
    public function user_can_edit_default_stringify_setting()
    {
        config()->set('api.stringify', false);

        $response = api()->ok()->getContent();

        $this->assertIsInt(json_decode($response, 1)['STATUS']);

    }

    /** @test */
    public function it_returns_response_from_base_helper_function()
    {
        $response = api(403, 'Forbidden response message', [])->getContent();
        $expectedResponse = [
            'STATUS' => 403,
            'MESSAGE' => 'Forbidden response message',
            'DATA' => Array()
        ];

        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }


    // TODO (3 test): test validation errors, default message validation, serer error response
}