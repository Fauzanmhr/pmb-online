@extends('layouts.app')

@section('title', 'Edit Pendaftaran - PMB Online')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-pencil-square me-2"></i>Edit Pendaftaran</h2>
                <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Edit data pendaftaran</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" id="pendaftaranForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- 1. Nama Lengkap -->
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap (sesuai ijazah) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" required>
                        </div>
                        <!-- 2. Alamat KTP & Alamat Lengkap Saat Ini -->
                        <div class="mb-3">
                            <label for="alamat_ktp" class="form-label">Alamat KTP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp" value="{{ old('alamat_ktp', $pendaftaran->alamat_ktp) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap Saat Ini <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap', $pendaftaran->alamat_lengkap) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $pendaftaran->kecamatan) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kabupaten_kode" class="form-label">Kabupaten <span class="text-danger">*</span></label>
                            <select class="form-select" id="kabupaten_kode" name="kabupaten_kode" required>
                                <option value="">Pilih Kabupaten</option>
                                @foreach($kabupaten as $kab)
                                    <option value="{{ $kab->kode }}" {{ old('kabupaten_kode', $pendaftaran->kabupaten_kode) == $kab->kode ? 'selected' : '' }}>{{ $kab->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi_kode" class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select class="form-select" id="provinsi_kode" name="provinsi_kode" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinsi as $prov)
                                    <option value="{{ $prov->kode }}" {{ old('provinsi_kode', $pendaftaran->provinsi_kode) == $prov->kode ? 'selected' : '' }}>{{ $prov->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $pendaftaran->nomor_telepon) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $pendaftaran->nomor_hp) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pendaftaran->email) }}" required>
                        </div>
                        <!-- 3. Kewarganegaraan -->
                        <div class="mb-3">
                            <label class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni_asli" value="WNI Asli" {{ old('kewarganegaraan', $pendaftaran->kewarganegaraan) == 'WNI Asli' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="wni_asli">WNI Asli</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni_keturunan" value="WNI Keturunan" {{ old('kewarganegaraan', $pendaftaran->kewarganegaraan) == 'WNI Keturunan' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="wni_keturunan">WNI Keturunan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="wna" value="WNA" {{ old('kewarganegaraan', $pendaftaran->kewarganegaraan) == 'WNA' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="wna">WNA</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" id="negara_wna" style="display: {{ $pendaftaran->kewarganegaraan == 'WNA' ? 'block' : 'none' }};">
                            <label for="bila_wna_sebutkan_negara" class="form-label">Bila WNA, sebutkan negara</label>
                            <input type="text" class="form-control" id="bila_wna_sebutkan_negara" name="bila_wna_sebutkan_negara" value="{{ old('bila_wna_sebutkan_negara', $pendaftaran->bila_wna_sebutkan_negara) }}">
                        </div>
                        <!-- 4. Tanggal Lahir (sesuai ijazah) -->
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir (sesuai ijazah) <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('Y-m-d') : '') }}" required>
                        </div>
                        <!-- 5. Tempat Lahir (sesuai ijazah) -->
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir (sesuai ijazah) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi_lahir" class="form-label">Provinsi Lahir <span class="text-danger">*</span></label>
                            <select class="form-select" id="provinsi_lahir" name="provinsi_lahir" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinsi as $prov)
                                    <option value="{{ $prov->kode }}" {{ old('provinsi_lahir', $pendaftaran->provinsi_lahir) == $prov->kode ? 'selected' : '' }}>{{ $prov->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kota_kabupaten_lahir" class="form-label">Kota/Kabupaten Lahir <span class="text-danger">*</span></label>
                            <select class="form-select" id="kota_kabupaten_lahir" name="kota_kabupaten_lahir" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach($kabupaten_lahir as $kab)
                                    <option value="{{ $kab->kode }}" {{ old('kota_kabupaten_lahir', $pendaftaran->kota_kabupaten_lahir) == $kab->kode ? 'selected' : '' }}>{{ $kab->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bila_tempat_lahir_diluar_negeri" class="form-label">Bila tempat lahir di luar negeri sebutkan negaranya</label>
                            <input type="text" class="form-control" id="bila_tempat_lahir_diluar_negeri" name="bila_tempat_lahir_diluar_negeri" value="{{ old('bila_tempat_lahir_diluar_negeri', $pendaftaran->bila_tempat_lahir_diluar_negeri) }}">
                        </div>
                        <!-- 6. Jenis Kelamin -->
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Pria' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="pria">Pria</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Wanita' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="wanita">Wanita</label>
                                </div>
                            </div>
                        </div>
                        <!-- 7. Status Menikah -->
                        <div class="mb-3">
                            <label class="form-label">Status Menikah <span class="text-danger">*</span></label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_menikah" id="belum_menikah" value="Belum menikah" {{ old('status_menikah', $pendaftaran->status_menikah) == 'Belum menikah' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="belum_menikah">Belum menikah</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_menikah" id="menikah" value="Menikah" {{ old('status_menikah', $pendaftaran->status_menikah) == 'Menikah' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="menikah">Menikah</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_menikah" id="lain_lain" value="Lain-lain" {{ old('status_menikah', $pendaftaran->status_menikah) == 'Lain-lain' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="lain_lain">Lain-lain</label>
                                </div>
                            </div>
                        </div>
                        <!-- 8. Agama -->
                        <div class="mb-3">
                            <label for="agama_id" class="form-label">Agama <span class="text-danger">*</span></label>
                            <select class="form-select" id="agama_id" name="agama_id" required>
                                <option value="">Pilih Agama</option>
                                @foreach($agama as $agm)
                                    <option value="{{ $agm->id }}" {{ old('agama_id', $pendaftaran->agama_id) == $agm->id ? 'selected' : '' }}>{{ $agm->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left me-2"></i>Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Update Pendaftaran
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Provinsi/Kabupaten alamat
    document.getElementById('provinsi_kode').addEventListener('change', function() {
        const provinsiKode = this.value;
        const kabupatenSelect = document.getElementById('kabupaten_kode');
        kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
        if (provinsiKode) {
            fetch(`/api/kabupaten/${provinsiKode}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(kabupaten => {
                        const option = document.createElement('option');
                        option.value = kabupaten.kode;
                        option.textContent = kabupaten.nama;
                        kabupatenSelect.appendChild(option);
                    });
                });
        }
    });
    // Provinsi/Kabupaten lahir
    document.getElementById('provinsi_lahir').addEventListener('change', function() {
        const provKode = this.value;
        const kabSelect = document.getElementById('kota_kabupaten_lahir');
        kabSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
        if (provKode) {
            fetch(`/api/kabupaten/${provKode}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(kab => {
                        const option = document.createElement('option');
                        option.value = kab.kode;
                        option.textContent = kab.nama;
                        kabSelect.appendChild(option);
                    });
                });
        }
    });
    // WNA
    const kewarganegaraanRadios = document.querySelectorAll('input[name="kewarganegaraan"]');
    const negaraWnaDiv = document.getElementById('negara_wna');
    kewarganegaraanRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'WNA') {
                negaraWnaDiv.style.display = 'block';
                document.getElementById('bila_wna_sebutkan_negara').required = true;
            } else {
                negaraWnaDiv.style.display = 'none';
                document.getElementById('bila_wna_sebutkan_negara').required = false;
            }
        });
    });
    // Check initial state
    const checkedKewarganegaraan = document.querySelector('input[name="kewarganegaraan"]:checked');
    if (checkedKewarganegaraan && checkedKewarganegaraan.value === 'WNA') {
        negaraWnaDiv.style.display = 'block';
        document.getElementById('bila_wna_sebutkan_negara').required = true;
    }
    // Form validation
    document.getElementById('pendaftaranForm').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const nomorHp = document.getElementById('nomor_hp').value;
        const nomorTelepon = document.getElementById('nomor_telepon').value;
        if (!validateEmail(email)) {
            e.preventDefault();
            showAlert('Format email tidak valid!');
            return;
        }
        if (!validatePhone(nomorHp)) {
            e.preventDefault();
            showAlert('Nomor HP harus berupa angka!');
            return;
        }
        if (nomorTelepon && !validatePhone(nomorTelepon)) {
            e.preventDefault();
            showAlert('Nomor telepon harus berupa angka!');
            return;
        }
    });
});
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
function validatePhone(phone) {
    return /^\d+$/.test(phone);
}
function showAlert(message) {
    alert(message);
}
</script>
@endsection
