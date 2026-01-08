<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    
    <div class="bg-gray-800 p-4 shadow-md flex justify-between items-center text-white sticky top-0 z-50">
        <h1 class="text-xl font-bold"><i class="fa-solid fa-list-check mr-2"></i> Kelola Pengajuan</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 text-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="container mx-auto p-6">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Tiket & Tgl</th>
                            <th class="py-3 px-6 text-left">Pemohon</th>
                            <th class="py-3 px-6 text-left">Layanan</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Aksi (Update)</th>
                            <th class="py-3 px-6 text-center">Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($data as $d)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-bold text-blue-600">{{ $d->kode_tiket }}</span><br>
                                <span class="text-xs">{{ $d->created_at->format('d M Y, H:i') }}</span>
                            </td>
                            
                            <td class="py-3 px-6 text-left">
                                <div class="font-bold">{{ $d->nama_pemohon }}</div>
                                <div class="text-xs">NIK: {{ $d->nik }}</div>
                                <div class="text-xs text-green-600"><i class="fa-brands fa-whatsapp"></i> {{ $d->no_hp }}</div>
                            </td>

                            <td class="py-3 px-6 text-left">
                                <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $d->jenis_layanan }}</span>
                                @if($d->keterangan_tambahan)
                                    <p class="text-xs italic text-gray-400 mt-1">"{{ Str::limit($d->keterangan_tambahan, 30) }}"</p>
                                @endif
                            </td>

                            <td class="py-3 px-6 text-center">
                                @php
                                    $color = 'bg-yellow-200 text-yellow-700';
                                    if($d->status == 'Diproses') $color = 'bg-blue-200 text-blue-700';
                                    if($d->status == 'Selesai') $color = 'bg-green-200 text-green-700';
                                    if($d->status == 'Ditolak') $color = 'bg-red-200 text-red-700';
                                @endphp
                                <span class="{{ $color }} py-1 px-3 rounded-full text-xs font-bold">{{ $d->status }}</span>
                            </td>

                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('admin.update', $d->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    <select name="status" class="border border-gray-300 rounded text-xs p-1 focus:ring focus:ring-blue-300">
                                        <option value="Menunggu" {{ $d->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Diproses" {{ $d->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Selesai" {{ $d->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Ditolak" {{ $d->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded text-xs" title="Simpan">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </button>
                                </form>
                            </td>

                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('admin.hapus', $d->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transform hover:scale-110">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>