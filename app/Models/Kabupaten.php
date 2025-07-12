<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    
    protected $fillable = [
        'kode',
        'nama',
        'provinsi_kode'
    ];

    // Relasi ke tabel provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_kode', 'kode');
    }

    // Relasi ke tabel pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'kabupaten_kode', 'kode');
    }
}
