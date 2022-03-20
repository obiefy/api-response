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

];
