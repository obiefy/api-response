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
    'match_status' => false,

    /*
     * Include the count of the "data" in the JSON response
     */
    'include_data_count' => false,

    /*
     * Json response's body labels.
     */
    'keys'      => [
        'status'     => 'STATUS',
        'message'    => 'MESSAGE',
        'data'       => 'DATA',
        'data_count' => 'DATA_COUNT',
    ],

    /*
     * Response default messages.
     */
    'messages' => [
        'success'    => 'Process is successfully completed',
        'notfound'   => 'Sorry no results query for your request.',
        'validation' => 'Validation Failed please check the request attributes and try again.',
        'forbidden'  => 'You don\'t have permission to access this content.',
        'error'      => 'Server error, please try again later',
    ],

];
