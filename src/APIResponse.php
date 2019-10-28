<?php

namespace Obiefy\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Traits\Macroable;

class APIResponse
{
    use Macroable;
    protected $statusLabel;
    protected $messageLabel;
    protected $dataLabel;

    public function __construct()
    {
        $this->statusLabel = config('api.keys.status');
        $this->messageLabel = config('api.keys.message');
        $this->dataLabel = config('api.keys.data');
    }

    /**
     * @param $status
     * @param $message
     * @param $data
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function response($status, $message, $data, ...$extraData)
    {
        $json = [
            $this->statusLabel  => config('api.stringify') ? strval($status) : $status,
            $this->messageLabel => $message,
            $this->dataLabel    => $data,
        ];

        if ($extraData) {
            foreach ($extraData as $extra) {
                $json = array_merge($json, $extra);
            }
        }

        return (config('api.matchstatus')) ? response()->json($json, $status) : response()->json($json);
    }

    /**
     * @param string $message
     * @param array  $data
     * @param array  $extraData
     *
     * @return JsonResponse
     */
    public function ok($message = '', $data = [], ...$extraData)
    {
        if (empty($message)) {
            $message = config('api.messages.success');
        }

        return $this->response(config('api.codes.success'), $message, $data, ...$extraData);
    }

    /**
     * @param string $message
     *
     * @return JsonResponse
     */
    public function notFound($message = '')
    {
        if (empty($message)) {
            $message = config('api.messages.notfound');
        }

        return $this->response(config('api.codes.notfound'), $message, []);
    }

    /**
     * @param string $message
     * @param array  $errors
     * @param array  $extraData
     *
     * @return JsonResponse
     */
    public function validation($message = '', $errors = [], ...$extraData)
    {
        if (empty($message)) {
            $message = config('api.messages.validation');
        }

        return $this->response(config('api.codes.validation'), $message, $errors, ...$extraData);
    }

    /**
     * @param $message
     * @param $errors
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function validationFailedWithMessage($message, $errors, ...$extraData)
    {
        return $this->response(422, $message, $errors, ...$extraData);
    }

    public function error($message = '', $data = [], ...$extraData)
    {
        if (empty($message)) {
            $message = config('api.messages.error');
        }

        return $this->response(config('api.codes.error'), $message, $data, ...$extraData);
    }
}
