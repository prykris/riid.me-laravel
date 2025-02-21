<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Riid.me API Configuration
    |--------------------------------------------------------------------------
    */

    'base_url' => env('RIIDME_API_URL', 'https://riid.me'),

    'timeout' => env('RIIDME_TIMEOUT', 5),

    'retries' => env('RIIDME_RETRIES', 3),
]; 