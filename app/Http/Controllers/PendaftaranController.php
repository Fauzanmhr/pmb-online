<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Kabupaten;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    // Tampilkan daftar pendaftaran berdasarkan role user
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $pendaftaran = Pendaftaran::where('email', Auth::user()->email)->first();
        
        return view('mahasiswa.pendaftaran-list', compact('pendaftaran'));
    }

    // Tampilkan form untuk membuat pendaftaran baru
    public function create()
    {
        $provinsi = Provinsi::orderByRaw("CASE WHEN nama = 'Lain-lain' THEN 1 ELSE 0 END, nama")->get();
        $agama = Agama::orderBy('nama')->get();
        
        return view('mahasiswa.create-pendaftaran', compact('provinsi', 'agama'));
    }

    // Simpan data pendaftaran baru ke database
    public function store(Request $request)
    {
        $validatedData = $this->validatePendaftaranData($request);

        Pendaftaran::create($validatedData);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Pendaftaran berhasil disimpan!');
    }

    // Tampilkan detail pendaftaran
    public function show($id)
    {
        $pendaftaran = Pendaftaran::with([
            'provinsi', 
            'kabupaten', 
            'agama', 
            'provinsiLahir', 
            'kabupatenLahir'
        ])->findOrFail($id);
        
        $this->authorizeAccess($pendaftaran);

        return view('shared.pendaftaran.show', compact('pendaftaran'));
    }

    // Tampilkan form untuk edit pendaftaran
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $this->authorizeAdminAccess();
        
        $provinsi = Provinsi::orderByRaw("CASE WHEN nama = 'Lain-lain' THEN 1 ELSE 0 END, nama")->get();
        $kabupaten = Kabupaten::where('provinsi_kode', $pendaftaran->provinsi_kode)
                              ->orderByRaw("CASE WHEN nama = 'Lain-lain' THEN 1 ELSE 0 END, nama")
                              ->get();
        $kabupaten_lahir = Kabupaten::where('provinsi_kode', $pendaftaran->provinsi_lahir)
                                   ->orderByRaw("CASE WHEN nama = 'Lain-lain' THEN 1 ELSE 0 END, nama")
                                   ->get();
        $agama = Agama::orderBy('nama')->get();
        
        return view('shared.pendaftaran.edit', compact(
            'pendaftaran', 
            'provinsi', 
            'kabupaten', 
            'agama', 
            'kabupaten_lahir'
        ));
    }

    // Update data pendaftaran yang sudah ada
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $this->authorizeAdminAccess();
        
        $validatedData = $this->validatePendaftaranData($request, $id);
        $pendaftaran->update($validatedData);
        
        return redirect()
            ->route('dashboard')
            ->with('success', 'Pendaftaran berhasil diupdate!');
    }

    // Hapus data pendaftaran
    public function destroy($id)
    {
        $this->authorizeAdminAccess();
        
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Pendaftaran berhasil dihapus!');
    }

    // Setujui pendaftaran (untuk admin)
    public function approve($id)
    {
        $this->authorizeAdminAccess();
        
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        // TODO: Implement approval logic
        // Consider adding status field to database
        
        return back()->with('success', 'Pendaftaran berhasil disetujui!');
    }

    // Tolak pendaftaran (untuk admin)
    public function reject($id)
    {
        $this->authorizeAdminAccess();
        
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        // TODO: Implement rejection logic
        // Consider adding status field to database
        
        return back()->with('success', 'Pendaftaran berhasil ditolak!');
    }

    // Export data pendaftaran ke PDF
    public function exportPdf($id)
    {
        $pendaftaran = Pendaftaran::with([
            'provinsi', 
            'kabupaten', 
            'agama', 
            'provinsiLahir', 
            'kabupatenLahir'
        ])->findOrFail($id);
        
        $this->authorizeAccess($pendaftaran);

        $pdf = Pdf::loadView('shared.pendaftaran.pdf', compact('pendaftaran'));
        
        return $pdf->download('bukti-pendaftaran-' . $pendaftaran->id . '.pdf');
    }

    // Validasi data pendaftaran dengan aturan yang umum
    private function validatePendaftaranData(Request $request, $id = null)
    {
        $emailRule = $id 
            ? 'required|email|unique:pendaftaran,email,' . $id
            : 'required|email|unique:pendaftaran,email';

        return $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'kabupaten_kode' => 'required|exists:kabupaten,kode',
            'provinsi_kode' => 'required|exists:provinsi,kode',
            'nomor_telepon' => 'required|numeric',
            'nomor_hp' => 'required|numeric',
            'email' => $emailRule,
            'kewarganegaraan' => 'required|in:WNI Asli,WNI Keturunan,WNA',
            'bila_wna_sebutkan_negara' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'kota_kabupaten_lahir' => 'required|exists:kabupaten,kode',
            'provinsi_lahir' => 'required|exists:provinsi,kode',
            'bila_tempat_lahir_diluar_negeri' => 'nullable|string',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'status_menikah' => 'required|in:Belum menikah,Menikah,Lain-lain',
            'agama_id' => 'required|exists:agama,id'
        ]);
    }

    // Cek otorisasi akses admin atau lempar error 403
    private function authorizeAdminAccess()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized: Admin access required.');
        }
    }

    // Cek otorisasi akses ke data pendaftaran
    private function authorizeAccess(Pendaftaran $pendaftaran)
    {
        if (!Auth::user()->isAdmin() && $pendaftaran->email !== Auth::user()->email) {
            abort(403, 'Unauthorized: Access denied to this registration.');
        }
    }
}
