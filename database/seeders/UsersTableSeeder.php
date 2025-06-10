<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@kompas.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // 4 user biasa
        User::factory(4)->create(['role' => 'user']);
        User::create([
            'name' => 'Luis',
            'email' => 'luis@kompas.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

    }
}

