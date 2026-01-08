<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Berita</h1>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-600 mr-4">Dashboard</a>
                <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    <i class="fa-solid fa-plus"></i> Tulis Berita
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-4">Gambar</th>
                        <th class="p-4">Judul & Tanggal</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berita as $b)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">
                            @if($b->gambar)
                                <img src="{{ asset('storage/'.$b->gambar) }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-lg">{{ $b->judul }}</div>
                            <div class="text-xs text-gray-500">{{ $b->created_at->format('d M Y') }}</div>
                        </td>
                        <td class="p-4"><span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $b->kategori }}</span></td>
                        <td class="p-4 text-center">
                            <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>