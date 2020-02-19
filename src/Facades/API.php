<?php

namespace Obiefy\API\Facades;

use Illuminate\Support\Facades\Facade;
use Obiefy\API\APIResponse;

/**
 * @method static APIResponse response($status, $message, $data, ...$extraData)
 * @method static APIResponse ok($message = '', $data = [], ...$extraData)
 * @method static APIResponse notFound($message = '')
 * @method static APIResponse validation($message = '', $errors = [], ...$extraData)
 *
 * @see APIResponse
 */
class API extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'api.response';
    }
}
