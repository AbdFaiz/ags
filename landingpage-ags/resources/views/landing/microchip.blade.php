<section id="microchip" class="relative py-32 bg-black overflow-hidden">
    <div class="absolute inset-0 opacity-20 pointer-events-none"
        style="background-image: radial-gradient(circle at 2px 2px, #222 1px, transparent 0); background-size: 40px 40px;">
    </div>

    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-full bg-linear-to-b from-transparent via-blue-500/50 to-transparent hidden lg:block">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        <div class="text-center mb-12 relative">
            <div class="inline-block relative">
                <h2
                    class="text-xs font-black uppercase tracking-[1em] text-blue-500 mb-8 drop-shadow-[0_0_10px_rgba(59,130,246,0.5)]">
                    Perbandingan Hardware</h2>
                <div class="absolute -bottom-2 left-0 w-full h-px bg-blue-500/30 overflow-hidden">
                    <div class="w-1/3 h-full bg-blue-500 animate-scan"></div>
                </div>
            </div>
            <h3
                class="text-6xl lg:text-[100px] font-bold text-white tracking-[0.02em] leading-none mt-12 mb-6 uppercase">
                THE <span class="text-transparent" style="-webkit-text-stroke: 1px #333;">EVOLUTION.</span>
            </h3>
            <p class="text-neutral-400 text-sm font-light leading-relaxed">
                Perbandingan mendalam antara teknologi <span
                    class="font-semibold text-white italic underline underline-offset-8 decoration-neutral-700">Chip
                    Module</span> dan sistem GPS konvensional.
            </p>
        </div>

        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-0 border border-neutral-800 rounded-[3rem] overflow-hidden bg-neutral-950/50 backdrop-blur-xl relative group/main">

            <div class="p-12 lg:p-24 relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-blue-600/5 blur-[120px] -translate-y-1/2 translate-x-1/2 group-hover/main:bg-blue-600/20 transition-all duration-700">
                </div>
                <div class="mb-20 pt-12">
                    <h4 class="text-4xl lg:text-5xl font-bold text-white mb-4 tracking-tighter">Chip Module</h4>
                    <p class="text-neutral-500 text-[10px] uppercase tracking-[0.4em] font-mono font-black italic">
                        Engineered for Stealth</p>
                </div>

                <div class="space-y-12">
                    <x-chip-feature type="modern" icon="fa-microchip" title="Dimension Core"
                        description="21×28×10mm. Form factor yang dirancang untuk menyatu dengan struktur internal kendaraan." />
                    <x-chip-feature type="modern" icon="fa-signal" title="BTS Integration"
                        description="Penetrasi sinyal maksimal di area basement & kontainer besi melalui jalur menara seluler." />
                    <x-chip-feature type="modern" icon="fa-bolt" title="Eco Management"
                        description="Hanya 250mA. Algoritma cerdas yang menjaga integritas aki kendaraan tetap prima." />

                </div>
            </div>

            <div
                class="p-12 lg:p-24 bg-neutral-950/80 relative grayscale group-hover/main:grayscale-0 transition-all duration-1000">

                <div class="mb-20 pt-12">
                    <h4 class="text-4xl lg:text-5xl font-bold text-neutral-500 mb-4 tracking-tighter">Legacy GPS</h4>
                    <p class="text-neutral-800 text-[10px] uppercase tracking-[0.4em] font-mono font-black">Traditional
                        System</p>
                </div>

                <div class="space-y-12 opacity-50 group-hover/main:opacity-70 transition-all duration-700">
                    <x-chip-feature type="legacy" icon="fa-box" title="Bulk Housing"
                        description="Dimensi besar yang membatasi fleksibilitas instalasi dan mudah dideteksi." />
                    <x-chip-feature type="legacy" icon="fa-satellite" title="Satellite Gap"
                        description="Blank spot permanen saat objek berada di bawah naungan atap beton atau gedung." />
                    <x-chip-feature type="legacy" icon="fa-wifi" title="Internet Dependent"
                        description="Sistem akan lumpuh total tanpa paket data aktif atau gangguan sinyal internet." />
                </div>
            </div>

        </div>

        <div
            class="mt-20 flex flex-col md:flex-row justify-between items-center gap-6 border-t border-neutral-900 pt-12">
            <div class="flex items-center gap-4">
                <div class="w-2 h-2 bg-blue-600 rounded-full animate-ping"></div>
                <p class="text-neutral-500 text-[10px] font-black uppercase tracking-[0.4em]">Current Tech Status:
                    Optimized</p>
            </div>
            <x-landing-button href="https://wa.me/6281110002425">
                Upgrade to Chip Module
            </x-landing-button>
        </div>
    </div>
</section>

<style>
    @keyframes scan {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(300%);
        }
    }

    .animate-scan {
        animation: scan 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
    }
</style>
