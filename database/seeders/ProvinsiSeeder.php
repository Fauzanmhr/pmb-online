<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    public function run(): void
    {
        $provinsi = [
            ['kode' => '1', 'nama' => 'NAD ACEH'],
            ['kode' => '2', 'nama' => 'SUMATERA UTARA'],
            ['kode' => '3', 'nama' => 'SUMATERA BARAT'],
            ['kode' => '4', 'nama' => 'SUMATERA SELATAN'],
            ['kode' => '5', 'nama' => 'RIAU'],
            ['kode' => '6', 'nama' => 'KEPULAUAN RIAU'],
            ['kode' => '7', 'nama' => 'JAMBI'],
            ['kode' => '8', 'nama' => 'BENGKULU'],
            ['kode' => '9', 'nama' => 'BANGKA BELITUNG'],
            ['kode' => '10', 'nama' => 'LAMPUNG'],
            ['kode' => '11', 'nama' => 'BANTEN'],
            ['kode' => '12', 'nama' => 'JAWA BARAT'],
            ['kode' => '13', 'nama' => 'JAWA TENGAH'],
            ['kode' => '14', 'nama' => 'JAWA TIMUR'],
            ['kode' => '15', 'nama' => 'DKI JAKARTA'],
            ['kode' => '16', 'nama' => 'DAERAH ISTIMEWA YOGYAKARTA'],
            ['kode' => '17', 'nama' => 'BALI'],
            ['kode' => '18', 'nama' => 'NUSA TENGGARA BARAT'],
            ['kode' => '19', 'nama' => 'NUSA TENGGARA TIMUR'],
            ['kode' => '20', 'nama' => 'KALIMANTAN BARAT'],
            ['kode' => '21', 'nama' => 'KALIMANTAN SELATAN'],
            ['kode' => '22', 'nama' => 'KALIMANTAN TENGAH'],
            ['kode' => '23', 'nama' => 'KALIMANTAN TIMUR'],
            ['kode' => '24', 'nama' => 'KALIMANTAN UTARA'],
            ['kode' => '25', 'nama' => 'GORONTALO'],
            ['kode' => '26', 'nama' => 'SULAWESI SELATAN'],
            ['kode' => '27', 'nama' => 'SULAWESI TENGGARA'],
            ['kode' => '28', 'nama' => 'SULAWESI TENGAH'],
            ['kode' => '29', 'nama' => 'SULAWESI UTARA'],
            ['kode' => '30', 'nama' => 'SULAWESI BARAT'],
            ['kode' => '31', 'nama' => 'MALUKU'],
            ['kode' => '32', 'nama' => 'MALUKU UTARA'],
            ['kode' => '33', 'nama' => 'PAPUA'],
            ['kode' => '34', 'nama' => 'PAPUA BARAT'],
            ['kode' => '35', 'nama' => 'LAIN-LAIN']
        ];

        foreach ($provinsi as $data) {
            Provinsi::create($data);
        }
    }
}
