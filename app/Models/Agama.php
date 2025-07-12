<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    
    protected $fillable = [
        'nama'
    ];

    // Relasi ke tabel pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
