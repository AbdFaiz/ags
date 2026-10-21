<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Adidata Global Sistem</title>
    <link rel="shortcut icon" href="{{ asset('img/3dlogowotxt.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Roboto:wght@400;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-roboto {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-neutral-950 antialiased text-slate-100 overflow-x-hidden">

    <header class="fixed top-0 left-0 w-full z-50 px-6 py-6 flex justify-center">
        <nav
            class="w-full max-w-7xl flex items-center justify-between p-2 bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.3)]">

            <div class="flex items-center">
                <a href="/" class="flex items-center justify-center gap-4 group">
                    <img src="{{ asset('img/3dlogowotxt.webp') }}" class="h-10 w-auto" alt="Logo">
                    <div class="hidden lg:flex flex-col border-l border-white/10 pl-4">
                        <span
                            class="text-[10px] font-black text-white tracking-[0.6em] uppercase leading-none">Adidata</span>
                        <span class="text-[9px] font-medium text-white/40 tracking-widest uppercase mt-1">Global
                            Sistem</span>
                    </div>
                </a>
            </div>

            <div class="hidden md:flex items-center rounded-full gap-1">

                <!-- Beranda -->
                <a href="#beranda"
                    class="px-6 py-2.5 text-[10px] font-extrabold text-white/50 
    hover:text-white transition-colors tracking-[0.2em] uppercase">
                    Beranda
                </a>

                <!-- divider pendek -->
                <span class="w-px h-3 bg-white/20"></span>

                <!-- Tentang -->
                <a href="#tentang"
                    class="px-6 py-2.5 text-[10px] font-extrabold text-white/50 
    hover:text-white transition-colors tracking-[0.2em] uppercase">
                    Tentang
                </a>

                <span class="w-px h-3 bg-white/20"></span>

                <!-- Harga -->
                <a href="#harga"
                    class="px-6 py-2.5 text-[10px] font-extrabold text-white/50 
    hover:text-white transition-colors tracking-[0.2em] uppercase">
                    Harga
                </a>

                <span class="w-px h-3 bg-white/20"></span>

                <!-- Harga -->
                <a href="#kontak"
                    class="px-6 py-2.5 text-[10px] font-extrabold text-white/50 
    hover:text-white transition-colors tracking-[0.2em] uppercase">
                    Kontak
                </a>

            </div>

            <a href="https://wa.me/6281110002425" target="_blank"
                class="bg-white text-black hover:bg-emerald-400 px-8 py-3 rounded-4xl text-[10px] font-black uppercase tracking-[0.2em] transition-all duration-500 shadow-lg flex items-center gap-2 active:scale-95">
                <i class="fab fa-whatsapp text-sm"></i>
                <span>Hubungi Kami</span>
            </a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-black/50 border-t border-white/5 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-20">

                <div class="lg:col-span-2">
                    <a href="/" class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('img/3dlogowotxt.webp') }}" class="h-12 w-auto" alt="Logo">
                        <span class="text-2xl font-black italic tracking-tighter font-roboto">ADIDATA</span>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm hover:text-slate-200 transition-colors ">
                        Membangun masa depan keamanan kendaraan dengan hardware tracking berbasis sinyal tower yang
                        lebih presisi, hemat daya, dan sulit terdeteksi oleh jammer konvensional.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Navigation</h4>
                    <ul class="space-y-4">
                        <li><a href="#beranda"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Beranda</a>
                        </li>
                        <li><a href="#tentang"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Tentang</a>
                        </li>
                        <li><a href="#microchip"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Teknologi</a>
                        </li>
                        <li><a href="#harga"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Harga</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Page</h4>
                    <ul class="space-y-4">
                        <li><a href="/produk"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Produk</a>
                        </li>
                        <li><a href="/blog"
                                class="text-slate-500 hover:text-slate-100 text-sm transition-colors uppercase tracking-widest font-bold text-[10px]">Blog</a>
                        </li>  
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Connect</h4>
                    <div class="flex gap-4 mb-8">
                        <a href="https://wa.me/6281110002425"
                            class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white hover:text-black transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Jakarta, Indonesia</p>
                </div>
            </div>

            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[10px] font-bold text-slate-600 uppercase tracking-[0.2em]">
                    &copy; 2026 PT. Adidata Global Sistem. <span class="hidden md:inline">/</span> Hardware Security
                    Division.
                </p>
                <div class="flex gap-6">
                    <a href="#"
                        class="text-[9px] font-bold text-slate-700 hover:text-white transition-colors uppercase tracking-[0.2em]">Privacy
                        Policy</a>
                    <a href="#"
                        class="text-[9px] font-bold text-slate-700 hover:text-white transition-colors uppercase tracking-[0.2em]">Terms
                        of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>

</html>
