<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat_ktp');
            $table->text('alamat_lengkap');
            $table->string('kecamatan');
            $table->string('kabupaten_kode', 4);
            $table->string('provinsi_kode', 2);
            $table->string('nomor_telepon');
            $table->string('nomor_hp');
            $table->string('email')->unique();
            $table->enum('kewarganegaraan', ['WNI Asli', 'WNI Keturunan', 'WNA']);
            $table->string('bila_wna_sebutkan_negara')->nullable();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('kota_kabupaten_lahir');
            $table->string('provinsi_lahir');
            $table->text('bila_tempat_lahir_diluar_negeri')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('status_menikah', ['Belum menikah', 'Menikah', 'Lain-lain']);
            $table->unsignedBigInteger('agama_id');
            $table->string('foto')->nullable();
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->timestamps();
            
            $table->foreign('kabupaten_kode')->references('kode')->on('kabupaten');
            $table->foreign('provinsi_kode')->references('kode')->on('provinsi');
            $table->foreign('agama_id')->references('id')->on('agama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
