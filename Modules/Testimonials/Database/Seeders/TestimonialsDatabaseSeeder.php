<?php

namespace Modules\Testimonials\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TestimonialsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('testimonials')->truncate();


        $testimonials = [
            [
                'name' => 'John Doe',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'status' => 1,
            ],
            [
                'name' => 'Janet Doe',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'status' => 1,
            ],
            [
                'name' => 'Sam Smith',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'status' => 1,
            ],
            [
                'name' => 'Lucas Modric',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'status' => 1,
            ],
            [
                'name' => 'Doe Jackson',
                'body'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'status' => 1,
            ],
    ];

        DB::table('testimonials')->insert($testimonials);
    }
}
