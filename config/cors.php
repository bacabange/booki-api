<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Content-Type', 'Accept', 'x-xsrf-token', ' x-csrf-token'],
    'allowedMethods' => ['GET', 'POST', 'PUT',  'DELETE', 'PATCH', 'HEAD'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],

];
