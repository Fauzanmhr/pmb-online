@extends('layouts.app')

@section('title', 'Pendaftaran Saya - PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-clipboard-data me-2"></i>Detail Pendaftaran</h2>
                @if(!$pendaftaran)
                    <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Isi Formulir Pendaftaran
                    </a>
                @endif
            </div>
        </div>
    </div>

    @if($pendaftaran)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-person-check me-2"></i>Detail Pendaftaran
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Informasi Dasar</h6>
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%"><strong>ID Pendaftaran</strong></td>
                                        <td>: PMB-{{ str_pad($pendaftaran->id, 6, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Lengkap</strong></td>
                                        <td>: {{ $pendaftaran->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>: {{ $pendaftaran->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>No. HP</strong></td>
                                        <td>: {{ $pendaftaran->nomor_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Daftar</strong></td>
                                        <td>: {{ $pendaftaran->formatted_tanggal_daftar }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Status & Aksi</h6>
                                <div class="text-center">
                                    <i class="bi bi-person-check display-3 text-primary mb-3"></i>
                                    <h5 class="text-primary">Pendaftaran Anda</h5>
                                    <p class="text-muted">Detail pendaftaran Anda telah tersimpan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <div>
                                        <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-info">
                                            <i class="bi bi-eye me-2"></i>Lihat Detail Lengkap
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('pendaftaran.pdf', $pendaftaran->id) }}" class="btn btn-success">
                                            <i class="bi bi-download me-2"></i>Unduh Bukti Pendaftaran (PDF)
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <!-- Belum ada pendaftaran -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-clipboard-x display-1 text-muted mb-4"></i>
                        <h4 class="text-muted mb-3">Belum Ada Pendaftaran</h4>
                        <p class="text-muted mb-4">
                            Anda belum mengisi formulir pendaftaran PMB. 
                            Silakan klik tombol di bawah untuk memulai proses pendaftaran.
                        </p>
                        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle me-2"></i>Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panduan Pendaftaran -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="card-body text-center">
                        <i class="bi bi-1-circle text-primary display-4"></i>
                        <h5 class="mt-3">Isi Formulir</h5>
                        <p class="text-muted">Lengkapi semua field yang diperlukan dalam formulir pendaftaran</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-2-circle text-warning display-4"></i>
                        <h5 class="mt-3">Verifikasi</h5>
                        <p class="text-muted">Data akan diverifikasi oleh admin dalam 1-3 hari kerja</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success">
                    <div class="card-body text-center">
                        <i class="bi bi-3-circle text-success display-4"></i>
                        <h5 class="mt-3">Hasil</h5>
                        <p class="text-muted">Unduh bukti pendaftaran dan tunggu informasi selanjutnya</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
