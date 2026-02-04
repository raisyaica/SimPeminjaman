<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Admin Sistem',
                'email'    => 'admin@peminjaman.test',
                'password' => Hash::make('password123'),
            ],
            [
                'name'     => 'Budi Santoso',
                'email'    => 'budi@peminjaman.test',
                'password' => Hash::make('password123'),
            ],
            [
                'name'     => 'Siti Nurhaliza',
                'email'    => 'siti@peminjaman.test',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
