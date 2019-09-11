<?php

//if (! function_exists('api')){
    /**
     * Create a new APIResponse instance.
     *
     * @param int    $status
     * @param string $message
     * @param array  $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function api($status = 200, $message = '', $data = [])
    {
        if (func_num_args() === 0) {
            return app('api');
        }

        return app('api')->response($status, $message, $data);
    }
//}
