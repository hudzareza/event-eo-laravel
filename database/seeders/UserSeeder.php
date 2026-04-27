<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // SUPER ADMIN
        User::updateOrCreate(
            ['email' => 'superadmin@mail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123456'),
                'role' => 'super_admin'
            ]
        );

        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
                'role' => 'admin'
            ]
        );

        // STAFF 
        User::updateOrCreate(
            ['email' => 'staff@mail.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('123456'),
                'role' => 'staff'
            ]
        );
    }
}