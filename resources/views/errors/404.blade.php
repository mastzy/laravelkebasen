<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 font-[Plus_Jakarta_Sans] h-screen flex items-center justify-center text-center px-4">
    
    <div>
        <h1 class="text-9xl font-extrabold text-green-200">404</h1>
        <p class="text-2xl font-bold text-slate-800 -mt-8 relative z-10">Waduh! Halaman Nyasar.</p>
        <p class="text-slate-500 mt-2 max-w-md mx-auto">Sepertinya halaman yang Anda cari tidak ada atau sudah dipindahkan.</p>
        
        <div class="mt-8">
            <a href="{{ url('/') }}" class="bg-green-600 text-white px-6 py-3 rounded-full font-bold hover:bg-green-700 transition shadow-lg">
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>
