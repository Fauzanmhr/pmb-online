<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;

class ApiController extends Controller
{
    public function getKabupaten($provinsiKode)
    {
        $kabupaten = Kabupaten::where('provinsi_kode', $provinsiKode)
                             ->orderByRaw("CASE WHEN nama = 'Lain-lain' THEN 1 ELSE 0 END, nama")
                             ->get();
        
        return response()->json($kabupaten);
    }
}
