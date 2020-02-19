<?php


namespace Obiefy\API\Contracts;


use Illuminate\Http\JsonResponse;

interface APIResponseContract {


    /**
     * Register response labels
     */
    public function setLabels();

    /**
     * Create API response
     *
     * @param int $status
     * @param string $message
     * @param array $data
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function response($status, $message, $data, ...$extraData);

    /**
     * Create successful (200) API response
     *
     * @param string $message
     * @param array $data
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function ok($message = '', $data = [], ...$extraData);

    /**
     * Create Not found (404) API response
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    public function notFound($message = '');

    /**
     * Create Validation (422) API response
     *
     * @param string $message
     * @param array $errors
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function validation($message = '', $errors = [], ...$extraData);

    /**
     * Create Server error (500) API response
     *
     * @param string $message
     * @param array $data
     * @param array $extraData
     *
     * @return JsonResponse
     */
    public function error($message = '', $data = [], ...$extraData);

}