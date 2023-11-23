<?php

namespace Database\Seeders;
use App\Models\UserModel;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('users')->insert([
            'role' => 'owner',
            'name' => 'tipayungkos',
            'username' => 'tipayungkos',
            'email' => 'tipayungkos@gmail.com',
            'password' => 'tipayungkos',
            'phone' => '00000'
        ]);
    }
}
