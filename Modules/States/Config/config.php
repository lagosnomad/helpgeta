<?php

return [
	'name' => 'States',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 100,
		'icon' => 'fa fa-map-marker',
	],
	'th' => ['name'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'States\Forms\StatesForm',
	'permissions'=>[
		'states' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
