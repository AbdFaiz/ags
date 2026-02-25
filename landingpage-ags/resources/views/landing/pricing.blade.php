<section id="harga" class="relative py-40 bg-black overflow-hidden">

    <div class="absolute top-0 w-full flex justify-center">
        <div class="max-w-7xl w-full">
            <x-marquee-text 
                text="KEAMANAN KENDARAAN • PELACAKAN REAL-TIME • PERLINDUNGAN 24 JAM" 
                speed="40s" 
            />
        </div>
    </div>

    <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
        <div class="w-200 h-200 border border-blue-600/20 rounded-full animate-[spin_60s_linear_infinite]"></div>
        <div
            class="absolute w-150 h-150 border border-dashed border-blue-900/40 rounded-full animate-[spin_40s_linear_infinite_reverse]">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 pt-10">
        <div class="mb-32 flex flex-col lg:flex-row lg:items-end justify-between gap-10">
            <div class="max-w-2xl">
                <h2 class="text-7xl lg:text-[100px] font-black text-white leading-none uppercase tracking-tighter">
                    FULL <span class="text-transparent" style="-webkit-text-stroke: 1px #444;">ACCESS.</span>
                </h2>
            </div>
        </div>

        <div class="relative border-y border-neutral-900 bg-neutral-950/20 py-20 px-10">
            <div class="absolute top-0 left-0 w-2 h-2 bg-blue-600 shadow-[0_0_10px_#2563eb]"></div>
            <div class="absolute top-0 right-0 w-2 h-2 bg-neutral-800"></div>
            <div class="absolute bottom-0 left-0 w-2 h-2 bg-neutral-800"></div>
            <div class="absolute bottom-0 right-0 w-2 h-2 bg-blue-600 shadow-[0_0_10px_#2563eb]"></div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20 items-center">
                <div class="space-y-12">
                    <x-pricing-feature title="Pelacakan Presisi"
                        description="Update lokasi setiap 60 detik dengan akurasi koordinat di bawah 5 meter." />
                    <x-pricing-feature title="Pagar Virtual"
                        description="Notifikasi instan jika kendaraan keluar atau masuk dari batas area yang Anda tentukan." />
                </div>

                <div class="relative py-20 flex flex-col items-center justify-center text-center">
                    <div class="absolute inset-0 bg-blue-600/10 blur-[120px] rounded-full"></div>
                    <div class="relative z-10">
                       <span class="text-[10px] font-black text-neutral-600 uppercase tracking-[1em] mb-10 block">
                            Investasi Tahunan
                        </span>
                        <div class="relative inline-block mb-10">
                            <h4 class="text-[120px] font-black text-white leading-none italic tracking-tighter">350K
                            </h4>
                            <span
                                class="absolute -top-4 -right-8 bg-blue-600 text-white text-[9px] font-mono px-3 py-1 uppercase tracking-widest">Yearly</span>
                        </div>
                        <div class="flex flex-col items-center group">
                            <x-landing-button href="https://wa.me/6281110002425" :rounded="false"
                                class="px-12 py-5 !tracking-[0.8em]">
                                Pesan Sekarang
                            </x-landing-button>
                            <span class="mt-6 text-[8px] font-mono text-neutral-700 uppercase tracking-[0.5em]">
                                Aktivasi Layanan Instan
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-12 lg:text-right">
                    <x-pricing-feature align="right" title="Riwayat Perjalanan"
                        description="Akses riwayat perjalanan lengkap selama 30 hari terakhir dalam server aman." />
                    <x-pricing-feature align="right" title="Matikan Mesin Jarak Jauh"
                        description="Keamanan penuh untuk memutus arus mesin via aplikasi saat kondisi darurat." />
                </div>
            </div>
        </div>

        {{-- <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 border-l border-neutral-900 pl-10">
            <div>
                <span class="text-[8px] font-mono text-neutral-700 block mb-2 uppercase">Platform</span>
                <span class="text-white text-[10px] font-bold uppercase tracking-widest">Multi-OS Support</span>
            </div>
            <div>
                <span class="text-[8px] font-mono text-neutral-700 block mb-2 uppercase">Uptime</span>
                <span class="text-white text-[10px] font-bold uppercase tracking-widest">99.9% Server Core</span>
            </div>
            <div>
                <span class="text-[8px] font-mono text-neutral-700 block mb-2 uppercase">Integration</span>
                <span class="text-white text-[10px] font-bold uppercase tracking-widest">API Ready</span>
            </div>
            <div>
                <span class="text-[8px] font-mono text-neutral-700 block mb-2 uppercase">Coverage</span>
                <span class="text-white text-[10px] font-bold uppercase tracking-widest">Global Network</span>
            </div>
        </div> --}}
    </div>
</section>
