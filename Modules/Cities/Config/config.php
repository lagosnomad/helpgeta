<?php

return [
	'name' => 'Cities',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 120,
		'icon' => 'fa fa-location-arrow',
	],
	'th' => ['name','state'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'state_name','name'=>'states.name'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Cities\Forms\CitiesForm',
	'permissions'=>[
		'cities' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
