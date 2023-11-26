<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tabungan;
use App\Models\UserModel;
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

        User::create([
            'role' => 'owner',
            'name' => 'tipayungkos',
            'username' => 'tipayungkos',
            'email' => 'tipayungkos@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'phone' => 123456789012
        ]);

        User::create([
            'role' => 'penyewa',
            'name' => 'siimut',
            'username' => 'siimut',
            'email' => 'siimut@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'phone' => '00000'
        ]);

        User::create([
            'role' => 'penyewa',
            'name' => 'jawa',
            'username' => 'jawa',
            'email' => 'jawa@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'phone' => '00000'
        ]);

        Tabungan::create([
            'namatabungan' => 'laptop',
            'targettabungan' => 20000,
            'saldotabungan' => 0,
            'user_id' => 2,
        ]);

        Tabungan::create([
            'namatabungan' => 'omah',
            'targettabungan' => 20000,
            'saldotabungan' => 0,
            'user_id' => 3,
        ]);
    }
}
