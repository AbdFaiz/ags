<header class="fixed top-0 left-0 w-full z-50 px-6 py-6 flex justify-center">
    <nav
        class="w-full max-w-7xl flex items-center justify-between p-2 bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.3)]">

        <div class="flex items-center">
            <a href="/">
            <x-application-logo class="pl-4" />
        </a>
        </div>

        <div class="hidden md:flex items-center rounded-full gap-1">

            <!-- Beranda -->
            <x-nav-link-landing href="#beranda">
                Beranda
            </x-nav-link-landing>
            <span class="w-px h-3 bg-white/20"></span>
            <x-nav-link-landing href="#tentang">
                Tentang
            </x-nav-link-landing>
            <span class="w-px h-3 bg-white/20"></span>
            <x-nav-link-landing href="#harga">
                Harga
            </x-nav-link-landing>
            <span class="w-px h-3 bg-white/20"></span>
            <x-nav-link-landing href="#kontak">
                Kontak
            </x-nav-link-landing>
        </div>

        <x-cta-button href="https://wa.me/6281110002425">
            Hubungi Kami
        </x-cta-button>
        </div>
    </nav>
</header>
