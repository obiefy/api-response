<?php

return [

    /*
     * Turn to string the status code in the json response's body.
     */
    'stringify' => true,

    /*
     * Set the status code from the json response to be the same as the status code
     * in the json response's body.
     */
    'matchstatus' => false,

    /*
     * Json response's body labels.
     */
    'keys'      => [
        'status'  => 'STATUS',
        'message' => 'MESSAGE',
        'data'    => 'DATA',
    ],

    /*
     * Default included status codes.
     */
    'codes' => [
        'success'    => 200,
        'notfound'   => 404,
        'validation' => 402,
        'error'      => 500,
    ],

    /*
     * Status codes default messages.
     */
    'messages' => [
        'success'    => 'Process is successfully completed',
        'notfound'   => 'Sorry no results query for your request.',
        'validation' => 'Validation Failed please check the request attributes and try again.',
        'error'      => 'Server error, please try again later',
    ],

    /**
     * Extra methods
     */
    'methods' => [
        [
            'code'    => 403,
            'method'  => 'forbidden',
            'message' => 'default message'
        ]
    ]
];
