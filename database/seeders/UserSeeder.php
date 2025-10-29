<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mauro Poloni',
            'email' => 'mauro061100@gmail.com',
            'password' => bcrypt('desarrollo_123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Joaquin Poloni',
            'email' => 'mauro@nexbu.com',
            'password' => bcrypt('desarrollo_123')
        ])->assignRole('Blogger');
        
        // User::factory(24)->create();
    }
}
