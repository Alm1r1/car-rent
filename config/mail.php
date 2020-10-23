<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    'port' => env('MAIL_PORT', 465),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'carrent189@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'CarRent'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),

    'username' => env('MAIL_USERNAME'),//this setting in .env only leave as is here

    'password' => env('MAIL_PASSWORD'),//this setting in .env only (use app password you created for gmail and PLEASE leave as is here

    'sendmail' => '/usr/sbin/sendmail -bs',

    'stream' => [
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];
