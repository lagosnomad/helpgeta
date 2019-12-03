<?php

return [
    'name'        => 'Categories',
    'order'       => [
        'id' => 'asc',
    ],
    'sidebar'     => [
        'weight' => 20,
        'icon'   => 'fa fa-cog',
    ],
    'th'          => ['Service Name','Parent Service','Uri','is_hourly_based','status'],
    'columns'     => [
        ['data' => 'category', 'name' => 'category'],
        ['data' => 'parent_title', 'name' => 'parent_id'],
        ['data' => 'uri', 'name' => 'uri'],
        /*['data' => 'amount', 'name' => 'amount'],*/
        ['data' => 'is_hourly_based', 'name' => 'is_hourly_based'],
        ['data' => 'status', 'name' => 'status'],
        ['data' => 'action', 'name' => 'action'],
    ],
    'form'        => 'Categories\Forms\CategoriesForm',
    'permissions' => [
        'categories' => [
            'index',
            'show',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
        ],
    ]
];
