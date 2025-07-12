<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    
    protected $fillable = [
        'kode',
        'nama'
    ];

    // Relasi ke tabel kabupaten
    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_kode', 'kode');
    }

    // Relasi ke tabel pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'provinsi_kode', 'kode');
    }
}
