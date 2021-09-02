<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'tam',
            'email' => 'tam@test.nl',
            'email_verified_at' => now(),
            'password' => bcrypt('pmwpassword!'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Movie::factory(20)->create();

        
       
       

     
    }
}
