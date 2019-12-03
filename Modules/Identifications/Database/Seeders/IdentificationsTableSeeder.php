<?php

namespace Modules\Identifications\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('identifications')->truncate();

        $identifications = [
            [
                'id' => 1,
                'title'=>'National ID',
            ],
            [
                'id' => 2,
                'title'=>'International Passport',
            ],
            [
                'id' => 3,
                'title'=>'Voter\'s Card',
            ],
        ];
        DB::table('identifications')->insert( $identifications );
    }
}
