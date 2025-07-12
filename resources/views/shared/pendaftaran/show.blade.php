@extends('layouts.app')

@section('title', 'Detail Pendaftaran - PMB Online')

@section('content')
<div class="container-fluid px-3 py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                <h2 class="mb-3 mb-md-0"><i class="bi bi-eye me-2"></i>Detail Pendaftaran</h2>
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <a href="{{ route('pendaftaran.pdf', $pendaftaran->id) }}" class="btn btn-success">
                        <i class="bi bi-download me-2"></i>Unduh PDF
                    </a>
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Hapus pendaftaran ini? Aksi ini tidak dapat dibatalkan!')">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i>Detail Pendaftaran
                    </h5>
                </div>
                <div class="card-body p-3">
                    <!-- Mobile View: Stack Layout -->
                    <div class="d-block d-md-none">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Nama Lengkap</small>
                                    <div class="fw-bold">{{ $pendaftaran->nama_lengkap }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Alamat KTP</small>
                                    <div>{{ $pendaftaran->alamat_ktp }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Alamat Lengkap Saat Ini</small>
                                    <div>{{ $pendaftaran->alamat_lengkap }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Kecamatan</small>
                                    <div>{{ $pendaftaran->kecamatan }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Kabupaten</small>
                                    <div>{{ $pendaftaran->kabupaten->nama ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Provinsi</small>
                                    <div>{{ $pendaftaran->provinsi->nama ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Nomor Telepon</small>
                                    <div>{{ $pendaftaran->nomor_telepon ?: '-' }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Nomor HP</small>
                                    <div>{{ $pendaftaran->nomor_hp }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Email</small>
                                    <div>{{ $pendaftaran->email }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Kewarganegaraan</small>
                                    <div>{{ $pendaftaran->kewarganegaraan }}</div>
                                </div>
                            </div>
                            @if($pendaftaran->bila_wna_sebutkan_negara)
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Negara (WNA)</small>
                                    <div>{{ $pendaftaran->bila_wna_sebutkan_negara }}</div>
                                </div>
                            </div>
                            @endif
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Tanggal Lahir</small>
                                    <div>{{ $pendaftaran->formatted_tanggal_lahir }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Tempat Lahir</small>
                                    <div>{{ $pendaftaran->tempat_lahir }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Provinsi Lahir</small>
                                    <div>{{ $pendaftaran->provinsiLahir->nama ?? '-' }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Kota/Kabupaten Lahir</small>
                                    <div>{{ $pendaftaran->kabupatenLahir->nama ?? '-' }}</div>
                                </div>
                            </div>
                            @if($pendaftaran->bila_tempat_lahir_diluar_negeri)
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Bila Tempat Lahir di Luar Negeri Sebutkan Negaranya</small>
                                    <div>{{ $pendaftaran->bila_tempat_lahir_diluar_negeri }}</div>
                                </div>
                            </div>
                            @endif
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Jenis Kelamin</small>
                                    <div>{{ $pendaftaran->jenis_kelamin }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Status Menikah</small>
                                    <div>{{ $pendaftaran->status_menikah }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom pb-2 mb-2">
                                    <small class="text-muted">Agama</small>
                                    <div>{{ $pendaftaran->agama->nama ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop/Tablet View: Table Layout -->
                    <div class="d-none d-md-block">
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold pe-3" style="width: 250px;">Nama Lengkap</td>
                                        <td>: {{ $pendaftaran->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Alamat KTP</td>
                                        <td>: {{ $pendaftaran->alamat_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Alamat Lengkap Saat Ini</td>
                                        <td>: {{ $pendaftaran->alamat_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Kecamatan</td>
                                        <td>: {{ $pendaftaran->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Kabupaten</td>
                                        <td>: {{ $pendaftaran->kabupaten->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Provinsi</td>
                                        <td>: {{ $pendaftaran->provinsi->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Nomor Telepon</td>
                                        <td>: {{ $pendaftaran->nomor_telepon ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Nomor HP</td>
                                        <td>: {{ $pendaftaran->nomor_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Email</td>
                                        <td>: {{ $pendaftaran->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Kewarganegaraan</td>
                                        <td>: {{ $pendaftaran->kewarganegaraan }}</td>
                                    </tr>
                                    @if($pendaftaran->bila_wna_sebutkan_negara)
                                    <tr>
                                        <td class="fw-bold pe-3">Negara (WNA)</td>
                                        <td>: {{ $pendaftaran->bila_wna_sebutkan_negara }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="fw-bold pe-3">Tanggal Lahir</td>
                                        <td>: {{ $pendaftaran->formatted_tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Tempat Lahir</td>
                                        <td>: {{ $pendaftaran->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Provinsi Lahir</td>
                                        <td>: {{ $pendaftaran->provinsiLahir->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Kota/Kabupaten Lahir</td>
                                        <td>: {{ $pendaftaran->kabupatenLahir->nama ?? '-' }}</td>
                                    </tr>
                                    @if($pendaftaran->bila_tempat_lahir_diluar_negeri)
                                    <tr>
                                        <td class="fw-bold pe-3">Bila Tempat Lahir di Luar Negeri Sebutkan Negaranya</td>
                                        <td>: {{ $pendaftaran->bila_tempat_lahir_diluar_negeri }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="fw-bold pe-3">Jenis Kelamin</td>
                                        <td>: {{ $pendaftaran->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Status Menikah</td>
                                        <td>: {{ $pendaftaran->status_menikah }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold pe-3">Agama</td>
                                        <td>: {{ $pendaftaran->agama->nama ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
