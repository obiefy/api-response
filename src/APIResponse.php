<?php

namespace Obiefy\API;

use Illuminate\Http\JsonResponse;

class APIResponse
{
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
     *
     * @return JsonResponse
     */
    public function response($status, $message, $data)
    {
        return response()->json([
            $this->statusLabel  => config('api.stringify') ? strval($status) : $status,
            $this->messageLabel => $message,
            $this->dataLabel    => $data,
        ], $status);
    }

    /**
     * @param $message
     * @param $data
     *
     * @return JsonResponse
     */
    public function ok($message = '', $data = [])
    {
        if (empty($message)) {
            $message = config('api.messages.success');
        }

        return $this->response(config('api.codes.success'), $message, $data);
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
     *
     * @return JsonResponse
     */
    public function validation($message = '', $errors = [])
    {
        if (empty($message)) {
            $message = config('api.messages.validation');
        }

        return $this->response(config('api.codes.validation'), $message, $errors);
    }

    /**
     * @param $errors
     * @param $message
     *
     * @return JsonResponse
     */
    public function validationFailedWithMessage($message, $errors)
    {
        return $this->response(422, $message, $errors);
    }

    public function error($message = '', $data = [])
    {
        if (empty($message)) {
            $message = config('api.messages.error');
        }

        return $this->response(config('api.codes.error'), $message, $data);
    }
}
