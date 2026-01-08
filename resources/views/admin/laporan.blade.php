<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Bulanan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="bg-gray-800 p-4 shadow-md flex justify-between items-center text-white">
        <h1 class="text-xl font-bold"><i class="fa-solid fa-print mr-2"></i> Pusat Laporan</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 text-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="container mx-auto p-8 flex justify-center">
        
        <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-8 border border-gray-200">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fa-solid fa-file-invoice text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Cetak Rekap Bulanan</h2>
                <p class="text-gray-500 text-sm">Pilih periode laporan yang ingin dicetak.</p>
            </div>

            <form action="{{ route('admin.laporan.cetak') }}" method="POST" target="_blank">
                @csrf
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Bulan</label>
                        <select name="bulan" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                            <option value="">- Pilih -</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Tahun</label>
                        <select name="tahun" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                            @for ($i = date('Y'); $i >= 2024; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 rounded-lg shadow-lg transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-print"></i> Cetak Laporan
                </button>

            </form>
        </div>

    </div>

</body>
</html>