<?php

return [
	'name' => 'Requests',
	'order' => [
		'id' => 'desc',
	],
	'sidebar' => [
		'weight' => 22,
		'icon' => 'fa fa-refresh',
	],
	'th' => ['#','date','total','requester','provider','status'],
	'columns'=>[
            ['data'=>'order_number','name'=>'order_number'],
            ['data'=>'created_at','name'=>'created_at'],
            ['data'=>'total','name'=>'total'],
            ['data'=>'user_name','name'=>'users.first_name'],
            ['data'=>'artisan_name','name'=>'artisan_users.first_name'],
            ['data'=>'status_name','name'=>'order_status.name'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Orders\Forms\OrdersForm',
	'permissions'=>[
		'orders' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
            'show',
			'destroy',
		],
	]
];
