<?php

return [
	'name' => 'Pages',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
	],
	'th' => ['title','parent','uri','status'],
	'form'=>'Pages\Forms\PageForm',

	'permissions'=>[
		'pages' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];