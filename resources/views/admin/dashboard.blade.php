<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portal Kebasen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex flex-col md:flex-row">
        
        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 md:relative md:h-screen z-10 w-full md:w-64">
            <div class="md:mt-12 md:w-64 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <div class="p-4 text-white font-bold text-xl text-center border-b border-gray-700">
                    <i class="fa-solid fa-user-shield mr-2"></i> ADMIN PANEL
                </div>
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    
                    <li class="mr-3 flex-1">
                        <a href="{{ route('admin.dashboard') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                            <i class="fa-solid fa-chart-line pr-0 md:pr-3 text-blue-600"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1">
                        <a href="{{ route('admin.kelola') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 transition">
                            <i class="fa-solid fa-list-check pr-0 md:pr-3 text-gray-500"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Kelola Data</span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1">
                        <a href="{{ route('admin.laporan') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-yellow-500 transition">
                            <i class="fa-solid fa-file-invoice pr-0 md:pr-3 text-gray-500"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Laporan Bulanan</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
    <a href="{{ route('admin.berita.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500 transition">
        <i class="fa-solid fa-newspaper pr-0 md:pr-3 text-gray-500"></i>
        <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Kabar Berita</span>
    </a>
</li>

                    <li class="mr-3 flex-1">
                        <a href="{{ url('/') }}" target="_blank" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-500 transition">
                            <i class="fa-solid fa-globe pr-0 md:pr-3 text-gray-500"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Lihat Web</span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1 mt-4 border-t border-gray-700 pt-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left block py-1 md:py-3 pl-1 align-middle text-red-400 no-underline hover:text-red-200 border-b-2 border-gray-800 hover:border-red-500 transition cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket pr-0 md:pr-3"></i>
                                <span class="pb-1 md:pb-0 text-xs md:text-base block md:inline-block">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-800 p-6 shadow-md text-white">
                <h3 class="font-bold pl-2 text-2xl">Dashboard Statistik</h3>
            </div>

            <div class="flex flex-wrap p-6">
                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-600 text-white"><i class="fa-solid fa-users fa-2x fa-fw"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Total Masuk</h5>
                                <h3 class="font-bold text-3xl">{{ $total }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-500 text-white"><i class="fa-solid fa-clock fa-2x fa-fw"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Menunggu</h5>
                                <h3 class="font-bold text-3xl">{{ $menunggu }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-400 text-white"><i class="fa-solid fa-spinner fa-2x fa-fw"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Diproses</h5>
                                <h3 class="font-bold text-3xl">{{ $diproses }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <div class="bg-white border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-500 text-white"><i class="fa-solid fa-check-circle fa-2x fa-fw"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Selesai</h5>
                                <h3 class="font-bold text-3xl">{{ $selesai }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full p-6">
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">5 Pengajuan Terbaru</h5>
                    </div>
                    <div class="p-5 overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-sm">
                                    <th class="py-2">Tanggal</th>
                                    <th class="py-2">Nama</th>
                                    <th class="py-2">Layanan</th>
                                    <th class="py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach($terbaru as $item)
                                <tr class="border-t">
                                    <td class="py-2">{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td class="py-2">{{ $item->nama_pemohon }}</td>
                                    <td class="py-2">{{ $item->jenis_layanan }}</td>
                                    <td class="py-2">
                                        <span class="px-2 py-1 rounded text-xs text-white {{ $item->status == 'Menunggu' ? 'bg-yellow-500' : ($item->status == 'Selesai' ? 'bg-green-500' : 'bg-blue-500') }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4 text-right">
                            <a href="{{ route('admin.kelola') }}" class="text-blue-600 hover:underline text-sm">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>