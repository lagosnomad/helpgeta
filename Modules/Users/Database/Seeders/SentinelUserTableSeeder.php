<?php namespace Modules\Users\Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SentinelUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Create an admin user
        $user = Sentinel::create(
            [
                'email' => 'test@admin.com',
                'username' => 'admin',
                'password' => 'admin',
                'first_name' => 'Digital',
                'last_name' => 'Edge',
            ]
        );
        // Activate the admin directly
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        // Find the group using the group id
        $adminGroup = Sentinel::findRoleBySlug('admin');

        // Assign the group to the user
        $adminGroup->users()->attach($user);
    }
}
