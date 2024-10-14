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

    'midtrans' => [
    'server-key' => env('SB-Mid-server-ByDKYRZYwTRWtXKH_x0CNbJp'),
    'client-key' => env('SB-Mid-client-QY9wUcoGabWu5bO6'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'development' => env('MIDTRANS_DEVELOPMENT', true),
    'is_sanitized' => true,
    'is_3ds' => true,
],


];
