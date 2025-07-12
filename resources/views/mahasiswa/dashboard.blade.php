@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa - PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-house-door me-2"></i>Dashboard</h2>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Welcome Card -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="bi bi-person-circle me-2 text-primary"></i>
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h4>
                    <p class="card-text">
                        Selamat datang di sistem Penerimaan Mahasiswa Baru (PMB) Online. 
                        Silakan lengkapi formulir pendaftaran Anda untuk melanjutkan proses penerimaan.
                    </p>
                    
                    @if(!$pendaftaran)
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Pendaftaran Belum Lengkap!</strong><br>
                            Anda belum mengisi formulir pendaftaran. Silakan klik tombol di bawah untuk melengkapi data pendaftaran Anda.
                        </div>
                        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Isi Formulir Pendaftaran
                        </a>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Formulir pendaftaran Anda telah disubmit pada {{ $pendaftaran->formatted_tanggal_daftar }}.
                        </div>
                        <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-primary me-2">
                            <i class="bi bi-eye me-2"></i>Lihat Detail Pendaftaran
                        </a>
                        <a href="{{ route('pendaftaran.pdf', $pendaftaran->id) }}" class="btn btn-success">
                            <i class="bi bi-download me-2"></i>Unduh Bukti Pendaftaran
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Status Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">
                        <i class="bi bi-clipboard-check me-2"></i>Status Pendaftaran
                    </h6>
                </div>
                <div class="card-body text-center">
                    @if(!$pendaftaran)
                        <i class="bi bi-clipboard-x display-1 text-muted mb-3"></i>
                        <h5 class="text-muted">Belum Mendaftar</h5>
                        <p class="text-muted">Formulir pendaftaran belum diisi</p>
                    @else
                        <i class="bi bi-clipboard-check display-1 text-success mb-3"></i>
                        <h5 class="text-success">Pendaftaran Sudah Lengkap</h5>
                        <p class="text-muted">Formulir pendaftaran Anda telah lengkap dan sudah disubmit.</p>
                        
                        <hr class="my-3">
                        
                        <div class="text-start">
                            <h6 class="text-primary mb-3">Informasi Pendaftaran</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="45%"><strong>ID Pendaftaran</strong></td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
