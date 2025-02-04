<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@exemple.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
    }
}
