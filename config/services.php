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
    'recaptcha' => [
        'key' => env('GOOGLE_RECAPTCHA_KEY'),
        'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
    ],
    'linkedin' => [
        'client_id' => '77836lr2kxw95z', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => 'ywr2ycVZELVCNF8i', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => url('/').'/social-login/linkedin/callback'
    ],
    'twitter' => [
        'client_id' => 'GEE21v3RLrTp7KIC7udAKLVFN',
        'client_secret' => 'li0zZyVJE1xqmHWtHlDvfZgzmKGuiRQANc98h1EAkee5sD9hEj',
        'redirect' => url('/').'/social-login/twitter/callback'
    ],

];
