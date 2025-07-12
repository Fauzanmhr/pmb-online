<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Tampilkan dashboard berdasarkan role pengguna
    public function index()
    {
        return Auth::user()->isAdmin() 
            ? $this->adminDashboard() 
            : $this->mahasiswaDashboard();
    }

    // Tampilkan dashboard admin dengan statistik dan data pendaftaran
    private function adminDashboard()
    {
        $statistics = $this->getStatistics();
        $pendaftaran = $this->getPendaftaranData();

        $data = array_merge($statistics, ['pendaftaran' => $pendaftaran]);

        return view('admin.dashboard', $data);
    }

    // Tampilkan dashboard mahasiswa dengan data pendaftaran mereka
    private function mahasiswaDashboard()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('email', $user->email)->first();

        return view('mahasiswa.dashboard', compact('pendaftaran'));
    }

    // Dapatkan statistik untuk dashboard admin
    private function getStatistics()
    {
        $totalPendaftar = Pendaftaran::count();
        $pendaftarHariIni = Pendaftaran::whereDate('created_at', today())->count();
        $pendaftarMingguIni = Pendaftaran::whereBetween('created_at', [
            now()->startOfWeek(), 
            now()->endOfWeek()
        ])->count();
        $pendaftarBulanIni = Pendaftaran::whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)
                                      ->count();
        
        // Gender statistics
        $jumlahPria = Pendaftaran::where('jenis_kelamin', 'Pria')->count();
        $jumlahWanita = Pendaftaran::where('jenis_kelamin', 'Wanita')->count();
        
        // Top provinces
        $topProvinsi = Pendaftaran::with('provinsi')
            ->selectRaw('provinsi_kode, COUNT(*) as total')
            ->groupBy('provinsi_kode')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return compact(
            'totalPendaftar',
            'pendaftarHariIni', 
            'pendaftarMingguIni',
            'pendaftarBulanIni',
            'jumlahPria',
            'jumlahWanita',
            'topProvinsi'
        );
    }

    // Dapatkan data pendaftaran dengan pagination dan relasi
    private function getPendaftaranData()
    {
        return Pendaftaran::with([
                'provinsi', 
                'kabupaten', 
                'agama', 
                'provinsiLahir', 
                'kabupatenLahir'
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}
