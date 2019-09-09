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
     * @return JsonResponse
     */
    public function response($status, $message, $data)
    {
        return response()->json([
            $this->statusLabel => config('api.stringify') ? strval($status) : $status,
            $this->messageLabel => $message,
            $this->dataLabel => $data
        ]);
    }


    /**
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public function ok($message = '', $data = [])
    {
        if(empty($message)){
            $message = config('api.messages.200');
        }
        return $this->response(200, $message, $data);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function notFound($message = '')
    {
        if(empty($message)){
            $message = config('api.messages.404');
        }
        return $this->response(404, $message, []);
    }


    /**
     * @param $errors
     * @return JsonResponse
     */
    public function validationFailed($errors)
    {
        return $this->response(422, 'Some Fields is required please check the it first', $errors);
    }


    /**
     * @param $errors
     * @param $message
     * @return JsonResponse
     */
    public function validationFailedWithMessage($message, $errors)
    {
        return $this->response(422, $message, $errors);
    }

    public function error($message, $data)
    {
        return $this->response(500, $message, $data);
    }
}
