<?php

namespace Obiefy\API\Facades;

use Illuminate\Support\Facades\Facade;
use Obiefy\API\ApiResponse;
use Obiefy\Api\Contracts\ApiInterface;

/**
 * @method static ApiResponse response($status, $message, $data, ...$extraData)
 * @method static ApiResponse ok($message = null, $data = [], ...$extraData)
 * @method static ApiResponse notFound($message = null)
 * @method static ApiResponse validation($message = null, $errors = [], ...$extraData)
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
        return ApiInterface::class;
    }
}
