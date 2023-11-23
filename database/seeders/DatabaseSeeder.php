<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'role' => 'owner',
            'name' => 'tipayungkos',
            'username' => 'tipayungkos',
            'email' => 'tipayungkos@gmail.com',
            'password' => 'tipayungkos',
            'phone' => null
        ]);
    }
}
