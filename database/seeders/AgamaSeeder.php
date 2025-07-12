<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    public function run(): void
    {
        $agama = [
            'Islam',
            'Katolik',
            'Protestan',
            'Hindu',
            'Budha',
            'Khong Hu Ciu'
        ];

        foreach ($agama as $nama) {
            Agama::create(['nama' => $nama]);
        }
    }
}
