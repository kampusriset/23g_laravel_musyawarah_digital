<?php

return [

    'defaults' => [
        'guard' => 'web',       // gunakan web guard default
        'passwords' => 'warga',
    ],

   'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'warga',
    ],
    'warga' => [
        'driver' => 'session',
        'provider' => 'warga',
    ],
],


    'providers' => [
        'warga' => [
            'driver' => 'eloquent',
            'model' => App\Models\Warga::class,
        ],
    ],

    'passwords' => [
        'warga' => [
            'provider' => 'warga',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
