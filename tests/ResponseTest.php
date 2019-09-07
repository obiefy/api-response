<?php
namespace Obiefy\Tests;
use Obiefy\API\APIServiceProvider;
use Obiefy\API\Facades\API;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
class ResponseTest extends OrchestraTestCase {

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->register(APIServiceProvider::class);
    }

    /** @test */
    public function it_returned_ok_response()
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
    public function it_returned_ok_response_from_helper_function()
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
    public function it_returned_ok_response_without_require_message_or_data()
    {
        $response = api()->ok()->getContent();
        $expectedResponse = [
            'MESSAGE' => '',
            'STATUS' => 200,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function user_can_edit_default_response_keys()
    {
        config()->set('api.keys.status', 'newStatus');
        config()->set('api.keys.message', 'newMessage');
        config()->set('api.keys.data', 'newData');

        $response = api()->ok()->getContent();
        $expectedResponse = [
            'newStatus' => 200,
            'newMessage' => '',
            "newData" => Array()
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }
}