@extends('layouts.app')

@section('title', 'Dashboard Admin - PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
                <h2 class="mb-0"><i class="bi bi-grid-3x3-gap me-2"></i>Dashboard Admin</h2>
                <span class="badge bg-primary fs-6">Admin Panel</span>
            </div>
        </div>
    </div>

    <!-- Data Pendaftaran Lengkap -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                        <h5 class="mb-0">
                            <i class="bi bi-list-ul me-2"></i>Daftar Pendaftar
                        </h5>
                        <span class="badge bg-light text-dark fs-6">Total: {{ $pendaftaran->total() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @if($pendaftaran->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="pendaftaranTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">No</th>
                                        <th style="min-width: 150px;">Nama Lengkap</th>
                                        <th class="d-none d-md-table-cell" style="min-width: 180px;">Email</th>
                                        <th class="d-none d-lg-table-cell" style="min-width: 120px;">No. HP</th>
                                        <th class="d-none d-lg-table-cell text-center" style="min-width: 100px;">Jenis Kelamin</th>
                                        <th class="d-none d-md-table-cell" style="min-width: 120px;">Provinsi</th>
                                        <th class="d-none d-xl-table-cell" style="min-width: 120px;">Kabupaten</th>
                                        <th class="d-none d-md-table-cell text-center" style="min-width: 100px;">Tanggal</th>
                                        <th class="text-center" style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendaftaran as $index => $p)
                                        <tr>
                                            <td class="text-center">{{ $pendaftaran->firstItem() + $index }}</td>
                                            <td>
                                                <div class="fw-semibold">{{ $p->nama_lengkap }}</div>
                                                <small class="text-muted d-md-none">
                                                    <i class="bi bi-envelope me-1"></i>{{ $p->email }}<br>
                                                    <i class="bi bi-phone me-1"></i>{{ $p->nomor_hp }}<br>
                                                    <i class="bi bi-person me-1"></i>{{ $p->jenis_kelamin }}<br>
                                                    <i class="bi bi-geo-alt me-1"></i>{{ $p->provinsi->nama ?? '-' }}
                                                </small>
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                <small>{{ $p->email }}</small>
                                            </td>
                                            <td class="d-none d-lg-table-cell">
                                                <small>{{ $p->nomor_hp }}</small>
                                            </td>
                                            <td class="d-none d-lg-table-cell text-center">
                                                <small>{{ $p->jenis_kelamin }}</small>
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                <small>{{ $p->provinsi->nama ?? '-' }}</small>
                                            </td>
                                            <td class="d-none d-xl-table-cell">
                                                <small>{{ $p->kabupaten->nama ?? '-' }}</small>
                                            </td>
                                            <td class="d-none d-md-table-cell text-center">
                                                <small>{{ $p->created_at->format('d/m/Y') }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 justify-content-center flex-nowrap">
                                                    <a href="{{ route('pendaftaran.show', $p->id) }}" 
                                                       class="btn btn-info btn-xs" 
                                                       title="Lihat Detail"
                                                       style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('pendaftaran.edit', $p->id) }}" 
                                                       class="btn btn-warning btn-xs" 
                                                       title="Edit"
                                                       style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('pendaftaran.pdf', $p->id) }}" 
                                                       class="btn btn-secondary btn-xs" 
                                                       title="Download PDF" 
                                                       target="_blank"
                                                       style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-file-pdf"></i>
                                                    </a>
                                                    <form action="{{ route('pendaftaran.destroy', $p->id) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-xs" 
                                                                title="Hapus"
                                                                style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $pendaftaran->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <h4 class="text-muted mt-3">Belum Ada Data Pendaftaran</h4>
                            <p class="text-muted">Belum ada calon mahasiswa yang mendaftar.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
