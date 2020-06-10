<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'instagram' => [
        'client_id' => 'b8cefd44b02a44a2ba98b9848059995a', // Your INSTAGRAM Client ID
        'client_secret' => '7569c74e51b342d1af8550f4d64940c8', // Your INSTAGRAM Client Secret
        'redirect' => 'http://novias.promediosdigitales.com/login/instagram/callback', //Your INSTAGRAM Callback URi
    ],

];
