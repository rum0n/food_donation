<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '642732010008-lbirp6smidbjq8frs19cut8lh8ddhsa6.apps.googleusercontent.com',
        'client_secret' => 'opAQ-EEMIcjcB6T_UQRyRGRV',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

//    'facebook' => [
//        'client_id' => 'app_id',
//        'client_secret' => 'pass',
//        'redirect' => 'http://localhost:8000/login/facebook/callback',
//    ],

];
