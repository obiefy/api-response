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
        config()->set('api.keys', [
            'status' => 'newStatus',
            'message' => 'newMessage',
            'data' => 'newData'
        ]);

        $response = api()->ok()->getContent();

        $expectedResponse = [
            'newStatus' => 200,
            'newMessage' => '',
            "newData" => Array()
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returned_404_response()
    {
        $response = api()->notFound('No results for your query')->getContent();
        $expectedResponse = [
            'MESSAGE' => 'No results for your query',
            'STATUS' => 404,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    /** @test */
    public function it_returned_404_response_with_default_config_message()
    {
        $response = api()->notFound()->getContent();
        $expectedResponse = [
            'MESSAGE' => config('api.messages.404'),
            'STATUS' => 404,
            "DATA" => []
        ];
        $this->assertEquals($expectedResponse, json_decode($response, 1));
    }

    // TODO (3 test): test validation errors, default message validation, serer error response
}