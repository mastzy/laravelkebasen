<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Bulanan - {{ $namaBulan }} {{ $tahun }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; margin: 40px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px double black; padding-bottom: 10px; }
        .header h2, .header h3, .header p { margin: 0; }
        .header h2 { font-size: 16pt; text-transform: uppercase; }
        .header p { font-style: italic; font-size: 10pt; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; font-size: 11pt; }
        th { background-color: #f0f0f0; text-align: center; font-weight: bold; }
        
        .ttd-area { margin-top: 50px; float: right; text-align: center; width: 250px; }
        .no-print { margin-bottom: 20px; }
        
        @media print {
            .no-print { display: none; }
            @page { size: A4; margin: 2cm; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print">
        <button onclick="window.history.back()" style="padding: 10px 20px; cursor: pointer;">&larr; Kembali</button>
    </div>

    <div class="header">
        <h3>PEMERINTAH KABUPATEN BANYUMAS</h3>
        <h2>KECAMATAN KEBASEN</h2>
        <p>Jl. Raya Kebasen No. 123, Telp. (0281) 123456, Kode Pos 53172</p>
    </div>

    <div style="text-align: center;">
        <h3 style="text-decoration: underline;">LAPORAN REKAPITULASI PELAYANAN</h3>
        <p>Bulan: <strong>{{ $namaBulan }} {{ $tahun }}</strong></p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 15%;">Tgl Masuk</th>
                <th style="width: 25%;">Nama Pemohon</th>
                <th style="width: 25%;">Jenis Layanan</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 15%;">Ket</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="text-align: center;">{{ $item->created_at->format('d/m/Y') }}</td>
                <td>{{ $item->nama_pemohon }}<br><small>NIK: {{ $item->nik }}</small></td>
                <td>{{ $item->jenis_layanan }}</td>
                <td style="text-align: center;">{{ $item->status }}</td>
                <td>{{ $item->kode_tiket }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">
                    <i>Tidak ada data pengajuan pada bulan ini.</i>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="ttd-area">
        <p>Kebasen, {{ date('d F Y') }}</p>
        <p>Camat Kebasen</p>
        <br><br><br><br>
        <p><strong><u>Toik Zakiyudin, S.Kom.</u></strong></p>
        <p>NIP. 19750101 200003 1 001</p>
    </div>

</body>
</html>