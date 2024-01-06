<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Mehmet Yılmaz',
            'email' => 'mehmet@mehmet.com',
            'password' => 'Mehmet01*',
            'userType'=> 'admin',
            ]);

            \App\Models\User::factory(10)->create();

    }
}
