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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pasaka Maile',
            'email' => 'mailepaskali@gmail.com',
            'password' => 'pasaka2302',
            'bio' => 'Web Developer',
            'is_admin' => true
        ]);
    }
}
