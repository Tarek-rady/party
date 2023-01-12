<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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

    'facebook' => [
        'client_id' => 808779103522617 , //Facebook API
        'client_secret' => 'a3b8e764192cb0d271c363deac304219', //Facebook Secret
        'redirect' => 'http://localhost/login/facebook/callback',
    ],


    'github' => [
        'client_id' => env('GITHUB_CLINT_ID'),
        'client_secret' => env('GITHUB_CLINT_ID'),
        'redirect' => 'http://localhost/login/github/callback',
    ],

    'twitter' => [
        'client_id' => env('TWIITER_CLINT_ID'),
        'client_secret' => env('TWIITER_CLINT_ID'),
        'redirect' => 'http://localhost/login/twitter/callback',
    ],


    'GOOGLE' => [
        'client_id' => env('GOOGLE_CLINT_ID'),
        'client_secret' => env('GOOGLE_CLINT_ID'),
        'redirect' => 'http://localhost/login/google/callback',
    ],

];
