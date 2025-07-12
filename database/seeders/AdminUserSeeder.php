<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@pmb.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Calon Mahasiswa',
            'email' => 'mahasiswa@pmb.ac.id',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa'
        ]);
    }
}
