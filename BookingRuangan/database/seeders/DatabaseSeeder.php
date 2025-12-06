<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin default
        User::factory()->create([
            'name' => 'Admin',                 // Nama admin
            'email' => 'admin@example.com',   // Email login admin
            'role' => 'admin',                // Role admin
            'password' => Hash::make('admin123'), // Password terenkripsi
        ]);
    }
}
