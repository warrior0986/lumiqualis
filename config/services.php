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
    'giphy' => [
        'url' => 'api.giphy.com/v1/gifs/search',
        'parameters' => [
            'api_key' => 'uGiu2rL7eUJ2zOvPMPila30ycl6LQEtQ',
        ],
    ],
    'tmdb' => [
        'url' => 'https://api.themoviedb.org/3/search/movie',
        'parameters' => [
            'api_key' => '437005f01389254e6289bd5862af018b',
        ],
    ],
    'nasa' => [
        'url' => 'https://api.nasa.gov/planetary/apod',
        'parameters' => [
            'api_key' => '0byjluNJagV0HiBo8u3LA5m12gcriGWYnYtUqs1L',
        ],
    ],
];
