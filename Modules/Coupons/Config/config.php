<?php

return [
	'name' => 'Coupons',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 200,
		'icon' => 'fa fa-gift',
	],
	'th' => ['code','start_date','end_date','reduction_type','reduction_amount','status'],
	'columns'=>[
            ['data'=>'code','name'=>'code'],
            ['data'=>'start_date','name'=>'start_date'],
            ['data'=>'end_date','name'=>'end_date'],
            ['data'=>'reduction_type','name'=>'reduction_type'],
            ['data'=>'reduction_amount','name'=>'reduction_amount'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Coupons\Forms\CouponsForm',
	'permissions'=>[
		'coupons' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
