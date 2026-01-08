<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Portal Kebasen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
        
        <div class="bg-blue-900 p-8 text-center">
            <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm text-white">
                <i class="fa-solid fa-user-shield text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white">Login Petugas</h2>
            <p class="text-blue-200 text-sm">Masuk untuk mengelola data pengajuan.</p>
        </div>

        <div class="p-8">
            
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-6 border border-red-200 flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <label class="block text-slate-700 font-bold mb-2 text-sm">Email Admin</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" class="w-full pl-10 pr-3 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="admin@kebasen.id" required>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-slate-700 font-bold mb-2 text-sm">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <i class="fa-solid fa-key"></i>
                        </span>
                        <input type="password" name="password" class="w-full pl-10 pr-3 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg transform hover:-translate-y-1">
                    Masuk Dashboard
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm text-slate-400 hover:text-blue-600 transition">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>