<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
                \App\Models\User::factory()->create([ // define factory seed
                    'name' => 'Test Admin User',
                    'email' => 'admin@example.com',
                    'password' =>  Hash::make('admin'),
                    'profile' => '0',
                ]);

       User::factory(5)->create(); //Random 5 seeds


     }
}
