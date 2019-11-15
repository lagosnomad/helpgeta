<?php

return [

    'mail_drivers'=> [
        'mail'    => 'Mail',
        'mailgun' => 'Mail Gun',
        'smtp'    => 'SMTP'
    ],

    'admin_prefix'=>'admin',

    'public_prefix'=>'account',

    'categories' => [
        'per_page' => 20,
    ],

    'faqs' => [
        'per_page' => 20,
    ],

    'testimonials' => [
        'per_page' => 20,
    ],

    'linkable_to_page' => ['categories'],

    'middleware' => [
        'backend' => [
            'auth.admin',
            'permissions',
        ],
        'account' => [
            'auth.account',
            /*'web'*/
        ],
        'api' => [
        ],
    ],
];
