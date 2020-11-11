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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
    'client_id' => '350894115328-fbht2buvvlhvsm1paft063st1o14ncdq.apps.googleusercontent.com',
    'client_secret' => '00yolXW88ZH9-dh2z1skczF4',
    'redirect' => 'http://localhost/diving_admin/login/google/callback',
],

 'facebook' => [
    'client_id' => '318969642508256',
    'client_secret' => '1d76e1820fae6d4b00fc36a9f66ad31d',
    'redirect' => 'http://localhost/diving_admin/login/facebook/callback',
],

];
