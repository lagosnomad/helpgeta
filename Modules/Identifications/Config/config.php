<?php

return [
	'name' => 'Identifications',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['name'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Identifications\Forms\IdentificationsForm',
	'permissions'=>[
		'identifications' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
