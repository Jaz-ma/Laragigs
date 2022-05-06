<?php

namespace Database\Seeders;

use App\Models\Listings;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $user= User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com'
        ]);
        Listings::factory(10)->create([
            'users_id'=>$user->id
        ]);
    }
}
