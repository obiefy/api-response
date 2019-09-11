<?php

return [

    'stringify' => true,
    'keys'      => [
        'status'  => 'STATUS',
        'message' => 'MESSAGE',
        'data'    => 'DATA',
    ],
    'codes' => [
        'success'    => 200,
        'notfound'   => 404,
        'validation' => 402,
    ],
    'messages' => [
        'success'    => 'Process is successfully completed',
        'notfound'   => 'Sorry no results query for your request.',
        'validation' => 'Validation Failed please check the request attributes and try again.',
    ],
];
