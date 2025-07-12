@extends('layouts.app')

@section('title', 'Detail User - Admin PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-person-lines-fill me-2"></i>Detail User</h2>
                <div>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-person-circle me-2"></i>Informasi User
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="avatar mb-3">
                                <div class="avatar-initial bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                     style="width: 80px; height: 80px; font-size: 2rem;">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="30%"><strong>ID User</strong></td>
                                    <td>: {{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Lengkap</strong></td>
                                    <td>: {{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>: {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Role</strong></td>
                                    <td>: 
                                        @if($user->role === 'admin')
                                            <span class="badge bg-danger">
                                                <i class="bi bi-shield-check me-1"></i>Admin
                                            </span>
                                        @else
                                            <span class="badge bg-primary">
                                                <i class="bi bi-person me-1"></i>Mahasiswa
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Daftar</strong></td>
                                    <td>: {{ $user->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Terakhir Update</strong></td>
                                    <td>: {{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @if($user->email_verified_at)
                                <tr>
                                    <td><strong>Email Verified</strong></td>
                                    <td>: 
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>Verified
                                        </span>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->role === 'mahasiswa')
            <!-- Informasi Pendaftaran (jika ada) -->
            @php
                $pendaftaran = \App\Models\Pendaftaran::where('email', $user->email)->first();
            @endphp
            
            @if($pendaftaran)
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-clipboard-check me-2"></i>Informasi Pendaftaran
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Nama Lengkap</strong></td>
                                    <td>: {{ $pendaftaran->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td><strong>No. HP</strong></td>
                                    <td>: {{ $pendaftaran->nomor_hp }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Kelamin</strong></td>
                                    <td>: {{ $pendaftaran->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Lahir</strong></td>
                                    <td>: {{ $pendaftaran->formatted_tanggal_lahir }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Status</strong></td>
                                    <td>: 
                                        @if($pendaftaran->status === 'pending')
                                            <span class="badge bg-warning">Menunggu</span>
                                        @elseif($pendaftaran->status === 'approved')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Daftar</strong></td>
                                    <td>: {{ $pendaftaran->formatted_tanggal_daftar }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Provinsi</strong></td>
                                    <td>: {{ $pendaftaran->provinsi->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Kabupaten</strong></td>
                                    <td>: {{ $pendaftaran->kabupaten->nama ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-info">
                                <i class="bi bi-eye me-2"></i>Lihat Detail Pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card mt-4">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard-x display-4 text-muted"></i>
                    <h5 class="text-muted mt-3">Belum Ada Pendaftaran</h5>
                    <p class="text-muted">User ini belum mengisi formulir pendaftaran PMB.</p>
                </div>
            </div>
            @endif
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-gear me-2"></i>Aksi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit User
                        </a>
                        
                        @if($user->id !== Auth::id())
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Hapus user ini? Aksi tidak dapat dibatalkan!')">
                                <i class="bi bi-trash me-2"></i>Hapus User
                            </button>
                        </form>
                        @else
                        <div class="alert alert-warning mb-0">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Catatan:</strong> Anda tidak dapat menghapus akun sendiri.
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>Statistik
                    </h5>
                </div>
                <div class="card-body">
                    <p><strong>User ke-{{ $user->id }}</strong> yang terdaftar</p>
                    <p><strong>Bergabung:</strong> {{ $user->created_at->diffForHumans() }}</p>
                    @if($user->role === 'mahasiswa' && isset($pendaftaran))
                        <p><strong>Status PMB:</strong> 
                            @if($pendaftaran->status === 'approved')
                                <span class="text-success">✓ Diterima</span>
                            @elseif($pendaftaran->status === 'pending')
                                <span class="text-warning">⏳ Pending</span>
                            @else
                                <span class="text-danger">✗ Ditolak</span>
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
