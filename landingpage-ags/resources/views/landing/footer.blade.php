<footer class="bg-black border-t border-white/5 pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-20">

            <div class="lg:col-span-2">
                <a href="/">
                    <x-application-logo />
                </a>
                <p class="text-slate-400 text-sm leading-relaxed max-w-sm hover:text-slate-200 transition-colors mt-4">
                    Membangun masa depan keamanan kendaraan dengan hardware tracking berbasis sinyal tower yang
                    lebih presisi, hemat daya, dan sulit terdeteksi oleh jammer konvensional.
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Navigation</h4>
                <ul class="space-y-4">
                    <x-footer-link href="#beranda">Beranda</x-footer-link>
                    <x-footer-link href="#tentang">Tentang</x-footer-link>
                    <x-footer-link href="#microchip">Teknologi</x-footer-link>
                    <x-footer-link href="#harga">Harga</x-footer-link>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Page</h4>
                <ul class="space-y-4">
                    <x-footer-link href="/produk">Produk</x-footer-link>
                    <x-footer-link href="/blog">Blog</x-footer-link>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-xs uppercase tracking-[0.2em] mb-8">Connect</h4>
                <div class="flex gap-4 mb-8 text-white">
                    <x-social-link href="https://wa.me/6281110002425" icon="fab fa-whatsapp" />
                    <x-social-link href="#" icon="fab fa-instagram" />
                    <x-social-link href="#" icon="fab fa-linkedin-in" />
                </div>
                <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[10px] font-bold text-slate-600 uppercase tracking-[0.2em]">
                &copy;2025 PT. Adidata Global Sistem
            </p>
            <div class="flex gap-6">
                <x-footer-link href="#" class="text-[9px] text-slate-700">Privacy Policy</x-footer-link>
                <x-footer-link href="#" class="text-[9px] text-slate-700">Terms of Service</x-footer-link>
            </div>
        </div>
    </div>
</footer>
