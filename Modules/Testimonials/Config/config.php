<?php

return [
	'name' => 'Testimonials',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['name','body','status'],
	'columns'=>[
            ['data'=>'name','name'=>'name'],
            ['data'=>'body','name'=>'body'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Testimonials\Forms\TestimonialsForm',
	'permissions'=>[
		'testimonials' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
