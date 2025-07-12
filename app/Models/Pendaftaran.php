<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    
    protected $fillable = [
        'nama_lengkap',
        'alamat_ktp',
        'alamat_lengkap',
        'kecamatan',
        'kabupaten_kode',
        'provinsi_kode',
        'nomor_telepon',
        'nomor_hp',
        'email',
        'kewarganegaraan',
        'bila_wna_sebutkan_negara',
        'tanggal_lahir',
        'tempat_lahir',
        'kota_kabupaten_lahir',
        'provinsi_lahir',
        'bila_tempat_lahir_diluar_negeri',
        'jenis_kelamin',
        'status_menikah',
        'agama_id'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_daftar' => 'datetime'
    ];

    // Relasi ke tabel provinsi untuk alamat saat ini
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_kode', 'kode');
    }

    // Relasi ke tabel kabupaten untuk alamat saat ini
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_kode', 'kode');
    }

    // Relasi ke tabel agama
    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }

    // Relasi ke tabel provinsi untuk tempat lahir
    public function provinsiLahir(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_lahir', 'kode');
    }

    // Relasi ke tabel kabupaten untuk tempat lahir
    public function kabupatenLahir(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kota_kabupaten_lahir', 'kode');
    }

    // Format tanggal lahir untuk ditampilkan
    public function getFormattedTanggalLahirAttribute(): string
    {
        return $this->tanggal_lahir 
            ? Carbon::parse($this->tanggal_lahir)->format('d/m/Y') 
            : '';
    }

    // Format tanggal pendaftaran untuk ditampilkan
    public function getFormattedTanggalDaftarAttribute(): string
    {
        return $this->created_at 
            ? $this->created_at->format('d/m/Y H:i') 
            : '';
    }
}
