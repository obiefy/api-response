<?php

namespace Obiefy\API\Facades;

use Illuminate\Support\Facades\Facade;

class API extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api.response';
    }
}
