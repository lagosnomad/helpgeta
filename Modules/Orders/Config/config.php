<?php

return [
	'name' => 'Requests',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 22,
		'icon' => 'fa fa-refresh',
	],
	'th' => ['name'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'status','name'=>'status'],
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
			'destroy',
		],
	]
];
