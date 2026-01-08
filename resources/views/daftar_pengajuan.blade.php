<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        
        <div class="bg-blue-800 p-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-white">
                <i class="fa-solid fa-list-check mr-2"></i> Daftar Pengajuan Masuk
            </h2>
            <a href="{{ route('home') }}" class="text-blue-200 hover:text-white text-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Menu
            </a>
        </div>

        <div class="p-6 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6">Tanggal</th>
                        <th class="py-3 px-6">Kode Tiket</th>
                        <th class="py-3 px-6">Nama Pemohon</th>
                        <th class="py-3 px-6">Layanan</th>
                        <th class="py-3 px-6">Status</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    
                    @forelse($dataPengajuan as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-6 font-bold text-blue-600">{{ $item->kode_tiket }}</td>
                        <td class="py-3 px-6">{{ $item->nama_pemohon }}</td>
                        <td class="py-3 px-6">{{ $item->jenis_layanan }}</td>
                        <td class="py-3 px-6">
                            @php
                                $warna = 'bg-yellow-200 text-yellow-800'; // Default Menunggu
                                if($item->status == 'Diproses') $warna = 'bg-blue-200 text-blue-800';
                                if($item->status == 'Selesai') $warna = 'bg-green-200 text-green-800';
                                if($item->status == 'Ditolak') $warna = 'bg-red-200 text-red-800';
                            @endphp
                            <span class="{{ $warna }} py-1 px-3 rounded-full text-xs font-bold">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="#" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="#" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">
                            Belum ada data pengajuan yang masuk.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>