<?php

return [
    'name' => 'Artisans',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 22,
        'icon' => 'fa fa-user',
    ],
    'th' => ['name','email','username','is activated?','is verified?'],
    'columns'=>[
        ['data'=>'user','name'=>'user.first_name'],
        ['data'=>'email','name'=>'user.email'],
        ['data'=>'username','name'=>'user.username'],
        ['data'=>'is_activated','name'=>'is_activated'],
        ['data'=>'is_verified','name'=>'is_verified'],
        ['data'=>'action','name'=>'action'],
    ],
    'form'=>'Artisans\Forms\ArtisansForm',
    'permissions'=>[
        'artisans' => [
            'index',
            'create',
            'show',
            'store',
            'edit',
            'update',
            'destroy',
        ],
    ]
];
