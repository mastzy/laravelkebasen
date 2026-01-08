<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Panggil Model User
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kebasen',
            'email' => 'admin@kebasen.id',
            'password' => Hash::make('admin123'), // Password di-enkripsi
        ]);
    }
}