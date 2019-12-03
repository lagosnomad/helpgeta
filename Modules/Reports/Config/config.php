<?php

return [
	'name' => 'Reports',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' =>300,
		'icon' => 'fa fa-list',
	],
	'th' => ['name'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Reports\Forms\ReportsForm',
	'permissions'=>[
		'reports' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
