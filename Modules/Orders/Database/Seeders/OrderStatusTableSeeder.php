<?php

namespace Modules\Orders\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('order_status')->truncate();

        $order_status = [
            [
                'id' => 1,
                'name'=>'Awaiting Confirmation',
                'slug'=>'awaiting',
                'color_class'=>'is-danger'
            ],
            [
                'id' => 2,
                'name'=>'Confirmed, Awaiting Payment',
                'slug'=>'confirmed',
                'color_class'=>'is-warning'
            ],
            [
                'id' => 3,
                'name'=>'In Progress',
                'slug'=>'in-progress',
                'color_class'=>'is-primary'
            ],
            [
                'id' => 4,
                'name'=>'Completed',
                'slug'=>'completed',
                'color_class'=>'is-success'
            ],
            [
                'id' => 5,
                'name'=>'Cancelled',
                'slug'=>'cancelled',
                'color_class'=>'is-info'
            ],
        ];
        DB::table('order_status')->insert( $order_status );
    }
}
