<?php namespace Modules\States\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->truncate();

        $states = array(
            array( // row #0
                'name'       => 'Federal Capital Territory',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #1
                'name'       => 'Abia',
                'country_id' => 172,
                'geo_zone'   => 1,
            ),
            array( // row #
                'name'       => 'Adamawa',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #3
                'name'       => 'Akwa Ibom',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #4
                'name'       => 'Anambra',
                'country_id' => 172,
                'geo_zone'   => 1,
            ),
            array( // row #5
                'name'       => 'Bauchi',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #6
                'name'       => 'Bayelsa',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #7
                'name'       => 'Benue',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #8
                'name'       => 'Bornu',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #9
                'name'       => 'Cross River ',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #10
                'name'       => 'Delta',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #11
                'name'       => 'Ebonyi ',
                'country_id' => 172,
                'geo_zone'   => 1,
            ),
            array( // row #12
                'name'       => 'Edo',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #13
                'name'       => 'Ekiti',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #14
                'name'       => 'Enugu',
                'country_id' => 172,
                'geo_zone'   => 1,
            ),
            array( // row #15
                'name'       => 'mbe',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #16
                'name'       => 'Imo',
                'country_id' => 172,
                'geo_zone'   => 1,
            ),
            array( // row #17
                'name'       => 'Jigawa',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #18
                'name'       => 'Kaduna',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #19
                'name'       => 'Kano',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #20
                'name'       => 'Katsina',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #21
                'name'       => 'Kebbi',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #2
                'name'       => 'Kogi',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #23
                'name'       => 'Kwara',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #24
                'name'       => 'Lagos',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #25
                'name'       => 'Nasarawa',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #26
                'name'       => 'Niger',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #27
                'name'       => 'Ogun',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #28
                'name'       => 'Ondo',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #29
                'name'       => 'Osun',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #30
                'name'       => 'Oyo',
                'country_id' => 172,
                'geo_zone'   => 3,
            ),
            array( // row #31
                'name'       => 'Plateau',
                'country_id' => 172,
                'geo_zone'   => 4,
            ),
            array( // row #32
                'name'       => 'Rivers',
                'country_id' => 172,
                'geo_zone'   => 2,
            ),
            array( // row #33
                'name'       => 'Sokoto',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
            array( // row #34
                'name'       => 'Taraba',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #35
                'name'       => 'Yobe',
                'country_id' => 172,
                'geo_zone'   => 5,
            ),
            array( // row #36
                'name'       => 'Zamfara',
                'country_id' => 172,
                'geo_zone'   => 6,
            ),
        );
        DB::table('states')->insert($states);
    }

}