<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Kecamatan Kebasen')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' }
                    }
                }
            }
        }
    </script>

    <style>
        /* Default Font */
        body { font-family: 'Inter', sans-serif; transition: all 0.3s ease; }

        /* --- CSS KHUSUS AKSESIBILITAS --- */
        
        /* 1. Mode Kontras Tinggi (High Contrast) */
        body.high-contrast {
            background-color: #000 !important;
            color: #ffff00 !important; /* Teks Kuning */
        }
        body.high-contrast * {
            background-color: #000 !important;
            color: #ffff00 !important;
            border-color: #ffff00 !important;
            box-shadow: none !important;
        }
        /* Pengecualian untuk gambar agar tetap terlihat */
        body.high-contrast img {
            filter: grayscale(100%) contrast(120%);
        }

        /* 2. Mode Grayscale (Hitam Putih) */
        body.grayscale-mode {
            filter: grayscale(100%);
        }

        /* 3. Font Ramah Disleksia (Font sederhana & tebal) */
        body.dyslexia-font {
            font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif !important;
            letter-spacing: 0.05em;
            line-height: 1.8;
        }

        /* Widget Melayang */
        #a11y-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        #a11y-menu {
            display: none;
            position: absolute;
            bottom: 60px;
            right: 0;
            width: 250px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            padding: 15px;
            border: 1px solid #e2e8f0;
        }
        #a11y-menu.show { display: block; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="bg-blue-600 text-white p-1.5 rounded-lg group-hover:bg-blue-700 transition">
                        <i class="fa-solid fa-landmark text-lg"></i>
                    </div>
                    <span class="font-bold text-xl text-slate-800 tracking-tight">Portal<span class="text-blue-600">Kebasen</span></span>
                </a>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Beranda</a>
                    <a href="{{ route('layanan') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Layanan</a>
                    <a href="{{ route('jadwal') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Jadwal</a>
                    <a href="{{ route('kontak') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Kontak</a>
                    <a href="{{ route('status') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition">Cek Status</a>
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-2 rounded-lg hover:bg-blue-100 transition ml-4">
                        <i class="fa-solid fa-lock mr-1"></i> Admin
                    </a>
                </div>

                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 focus:outline-none"><i class="fa-solid fa-bars text-2xl"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-400 py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="mb-4 text-sm">&copy; {{ date('Y') }} Pemerintah Kecamatan Kebasen.</p>
        </div>
    </footer>

    <div id="a11y-widget">
        <div id="a11y-menu" class="text-left">
            <h4 class="font-bold text-slate-800 border-b pb-2 mb-3 flex items-center gap-2">
                <i class="fa-solid fa-universal-access text-blue-600"></i> Aksesibilitas
            </h4>
            
            <div class="space-y-2">
                <button onclick="resizeText(1)" class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 flex items-center gap-3 text-slate-700">
                    <i class="fa-solid fa-magnifying-glass-plus"></i> Perbesar Teks
                </button>
                
                <button onclick="resizeText(-1)" class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 flex items-center gap-3 text-slate-700">
                    <i class="fa-solid fa-magnifying-glass-minus"></i> Perkecil Teks
                </button>

                <button onclick="toggleContrast()" class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 flex items-center gap-3 text-slate-700">
                    <i class="fa-solid fa-circle-half-stroke"></i> Kontras Tinggi
                </button>

                <button onclick="toggleGrayscale()" class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 flex items-center gap-3 text-slate-700">
                    <i class="fa-solid fa-eye-slash"></i> Mode Hitam Putih
                </button>

                <button onclick="toggleDyslexia()" class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 flex items-center gap-3 text-slate-700">
                    <i class="fa-solid fa-font"></i> Font Mudah Baca
                </button>
                
                <hr class="my-2">
                
                <button onclick="resetA11y()" class="w-full text-center px-3 py-2 text-xs font-bold text-red-600 hover:bg-red-50 rounded">
                    Reset Pengaturan
                </button>
            </div>
        </div>

        <button onclick="toggleMenu()" class="bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition transform hover:scale-110" title="Fitur Disabilitas">
            <i class="fa-solid fa-universal-access text-2xl"></i>
        </button>
    </div>

    <script>
        // 1. Toggle Menu
        function toggleMenu() {
            document.getElementById('a11y-menu').classList.toggle('show');
        }

        // 2. Resize Teks
        let currentZoom = 100;
        function resizeText(multiplier) {
            if (multiplier === 1) currentZoom += 10;
            else if (multiplier === -1) currentZoom -= 10;
            
            // Batas minimal 80%, maksimal 150%
            if (currentZoom < 80) currentZoom = 80;
            if (currentZoom > 170) currentZoom = 170;

            document.documentElement.style.fontSize = currentZoom + "%";
            localStorage.setItem('a11y_zoom', currentZoom);
        }

        // 3. Kontras Tinggi
        function toggleContrast() {
            document.body.classList.toggle('high-contrast');
            localStorage.setItem('a11y_contrast', document.body.classList.contains('high-contrast'));
            // Matikan mode lain agar tidak bentrok
            document.body.classList.remove('grayscale-mode');
        }

        // 4. Grayscale
        function toggleGrayscale() {
            document.body.classList.toggle('grayscale-mode');
            localStorage.setItem('a11y_grayscale', document.body.classList.contains('grayscale-mode'));
            // Matikan mode lain
            document.body.classList.remove('high-contrast');
        }

        // 5. Dyslexia Font
        function toggleDyslexia() {
            document.body.classList.toggle('dyslexia-font');
            localStorage.setItem('a11y_dyslexia', document.body.classList.contains('dyslexia-font'));
        }

        // 6. Reset
        function resetA11y() {
            currentZoom = 100;
            document.documentElement.style.fontSize = "100%";
            document.body.classList.remove('high-contrast', 'grayscale-mode', 'dyslexia-font');
            
            localStorage.removeItem('a11y_zoom');
            localStorage.removeItem('a11y_contrast');
            localStorage.removeItem('a11y_grayscale');
            localStorage.removeItem('a11y_dyslexia');
        }

        // 7. Load Settings saat halaman dibuka (Agar settingan tidak hilang saat refresh)
        window.onload = function() {
            if(localStorage.getItem('a11y_zoom')) {
                currentZoom = parseInt(localStorage.getItem('a11y_zoom'));
                document.documentElement.style.fontSize = currentZoom + "%";
            }
            if(localStorage.getItem('a11y_contrast') === 'true') {
                document.body.classList.add('high-contrast');
            }
            if(localStorage.getItem('a11y_grayscale') === 'true') {
                document.body.classList.add('grayscale-mode');
            }
            if(localStorage.getItem('a11y_dyslexia') === 'true') {
                document.body.classList.add('dyslexia-font');
            }
        }
    </script>

</body>
</html>