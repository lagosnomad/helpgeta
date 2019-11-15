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
    'th' => ['name','slug'],
    'columns'=>[
        ['data'=>'user','name'=>'user.first_name'],
        ['data'=>'slug','name'=>'slug'],
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
