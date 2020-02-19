<?php

use Illuminate\Http\JsonResponse;
use Obiefy\API\Contracts\APIResponseContract;

if (!function_exists('api')) {

    /**
     * Create a new APIResponse instance.
     *
     * @param int    $status
     * @param string $message
     * @param array  $data
     * @param array  $extraData
     *
     * @return JsonResponse
     */
    function api($status = 200, $message = '', $data = [], ...$extraData)
    {
        if (func_num_args() === 0) {
            return app(APIResponseContract::class);
        }

        return app(APIResponseContract::class)->response($status, $message, $data, ...$extraData);
    }
}
