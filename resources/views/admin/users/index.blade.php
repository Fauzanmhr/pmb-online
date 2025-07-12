@extends('layouts.app')

@section('title', 'Manajemen User - Admin PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
                <h2 class="mb-0"><i class="bi bi-people me-2"></i>Manajemen User</h2>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus me-2"></i>Tambah User
                </a>
            </div>
        </div>
    </div>

    <!-- Data User Lengkap -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                        <h5 class="mb-0">
                            <i class="bi bi-list-ul me-2"></i>Daftar User
                        </h5>
                        <span class="badge bg-light text-dark fs-6">Total: {{ $users->total() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @if($users->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="usersTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">No</th>
                                        <th style="min-width: 200px;">Nama</th>
                                        <th class="d-none d-md-table-cell" style="min-width: 180px;">Email</th>
                                        <th class="d-none d-lg-table-cell text-center" style="min-width: 100px;">Role</th>
                                        <th class="d-none d-md-table-cell text-center" style="min-width: 120px;">Tanggal</th>
                                        <th class="text-center" style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <td class="text-center">{{ $users->firstItem() + $index }}</td>
                                            <td>
                                                <div class="fw-semibold">{{ $user->name }}</div>
                                                @if($user->id === Auth::id())
                                                    <small class="text-muted">(Anda)</small>
                                                @endif
                                                <small class="text-muted d-md-none">
                                                    <br><i class="bi bi-envelope me-1"></i>{{ $user->email }}
                                                    <br><i class="bi bi-person-badge me-1"></i>{{ ucfirst($user->role) }}
                                                    <br><i class="bi bi-calendar me-1"></i>{{ $user->created_at->format('d/m/Y') }}
                                                </small>
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                <small>{{ $user->email }}</small>
                                            </td>
                                            <td class="d-none d-lg-table-cell text-center">
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
                                            <td class="d-none d-md-table-cell text-center">
                                                <small>{{ $user->created_at->format('d/m/Y') }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 justify-content-center flex-nowrap">
                                                    <a href="{{ route('admin.users.show', $user->id) }}" 
                                                       class="btn btn-info btn-xs" 
                                                       title="Lihat Detail"
                                                       style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                                       class="btn btn-warning btn-xs" 
                                                       title="Edit"
                                                       style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    @if($user->id !== Auth::id())
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                                              method="POST" 
                                                              class="d-inline"
                                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    class="btn btn-danger btn-xs" 
                                                                    title="Hapus"
                                                                    style="padding: 2px 6px; font-size: 10px; min-width: 24px; height: 22px; display: flex; align-items: center; justify-content: center;">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $users->links() }}
                        </div>
                        
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-people display-1 text-muted"></i>
                            <h4 class="text-muted mt-3">Belum Ada User</h4>
                            <p class="text-muted">Belum ada user yang terdaftar dalam sistem.</p>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus me-2"></i>Tambah User Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
