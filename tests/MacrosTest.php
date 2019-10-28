<?php

namespace Obiefy\API\Tests;

use Obiefy\API\Facades\API;

class MacrosTest extends TestCase
{
    /** @test */
    public function it_returns_macro_method()
    {
        API::macro('test', function () {
            return 'test message';
        });

        $this->assertEquals(API::test(), 'test message');
    }

    /** @test */
    public function it_generate_macro_methods_from_config_file()
    {
        $this->assertEquals(response()->json([
            'STATUS'  => '403',
            'MESSAGE' => 'new message',
            'DATA'    => [],
        ]),
            API::forbidden('new message', []));
    }

    /** @test */
    public function it_generate_macro_methods_with_default_message()
    {
        $this->assertEquals(response()->json([
            'STATUS'  => '403',
            'MESSAGE' => 'default message',
            'DATA'    => [],
        ]),
            API::forbidden());
    }
}
