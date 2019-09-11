<?php

namespace Obiefy\API\Tests;

use Obiefy\API\APIServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->app->register(APIServiceProvider::class);
    }
}
