<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pendaftaran PMB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }
        .content {
            margin-bottom: 15px;
        }
        .section-title {
            background-color: #f8f9fa;
            padding: 6px 12px;
            font-weight: bold;
            border-left: 4px solid #007bff;
            margin: 15px 0 8px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table td {
            padding: 6px 12px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        table td:first-child {
            width: 30%;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ccc;
            font-size: 10px;
            color: #666;
        }
        .qr-section {
            float: right;
            width: 150px;
            text-align: center;
            margin-left: 20px;
        }
        .info-box {
            background-color: #f8f9fa;
            padding: 12px;
            border-radius: 5px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BUKTI PENDAFTARAN</h1>
        <h2>PENERIMAAN MAHASISWA BARU</h2>
        <p>Universitas XYZ - Tahun Akademik 2025/2026</p>
    </div>

    <div class="content">
        <div class="info-box">
            <strong>ID Pendaftaran:</strong> PMB-{{ str_pad($pendaftaran->id, 6, '0', STR_PAD_LEFT) }}<br>
            <strong>Tanggal Pendaftaran:</strong> {{ $pendaftaran->formatted_tanggal_daftar }}<br>
        </div>

        <div class="section-title">DATA PRIBADI</div>
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>{{ $pendaftaran->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Alamat KTP</td>
                <td>{{ $pendaftaran->alamat_ktp }}</td>
            </tr>
            <tr>
                <td>Alamat Lengkap Saat Ini</td>
                <td>{{ $pendaftaran->alamat_lengkap }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>{{ $pendaftaran->kecamatan }}</td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>{{ $pendaftaran->kabupaten->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>{{ $pendaftaran->provinsi->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>{{ $pendaftaran->nomor_telepon ?: '-' }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>{{ $pendaftaran->nomor_hp }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $pendaftaran->email }}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>{{ $pendaftaran->kewarganegaraan }}</td>
            </tr>
            @if($pendaftaran->bila_wna_sebutkan_negara)
            <tr>
                <td>Negara (WNA)</td>
                <td>{{ $pendaftaran->bila_wna_sebutkan_negara }}</td>
            </tr>
            @endif
            <tr>
                <td>Tanggal Lahir</td>
                <td>{{ $pendaftaran->formatted_tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>{{ $pendaftaran->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>Provinsi Lahir</td>
                <td>{{ $pendaftaran->provinsiLahir->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Kota/Kabupaten Lahir</td>
                <td>{{ $pendaftaran->kabupatenLahir->nama ?? '-' }}</td>
            </tr>
            @if($pendaftaran->bila_tempat_lahir_diluar_negeri)
            <tr>
                <td>Bila Tempat Lahir di Luar Negeri Sebutkan Negaranya</td>
                <td>{{ $pendaftaran->bila_tempat_lahir_diluar_negeri }}</td>
            </tr>
            @endif
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $pendaftaran->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Status Menikah</td>
                <td>{{ $pendaftaran->status_menikah }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>{{ $pendaftaran->agama->nama ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak secara otomatis oleh sistem PMB Online</p>
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
        <p>© 2025 Universitas XYZ - Sistem PMB Online</p>
    </div>
</body>
</html>
