<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sandbox8d797ae33dc94c43b25d7f02ba4f2119.mailgun.org',
        'secret' => 'key-2j8wodtjz97hwb7x6vwpgolon7d9yb65',
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_KEY'),
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

];
