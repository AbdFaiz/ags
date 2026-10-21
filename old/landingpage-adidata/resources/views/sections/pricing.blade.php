<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
    /* Masking untuk seluruh baris background dan kontennya */
    .full-row-mask {
        mask-image: linear-gradient(to right, transparent, black 15%, black 50%, black 85%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 50%, black 85%, transparent);
    }
</style>

<section id="harga" class="relative py-40 bg-black overflow-hidden">
    
    <div class="absolute top-0 w-full flex justify-center">
        <div class="max-w-7xl w-full">
            <div class="w-full py-4 border-b border-neutral-900 bg-neutral-950/50 relative overflow-hidden full-row-mask">
                <div class="flex whitespace-nowrap animate-marquee font-mono text-[9px] text-blue-900 uppercase tracking-[1em]">
                    &nbsp; KEAMANAN KENDARAAN • PELACAKAN REAL-TIME • PERLINDUNGAN 24 JAM • KEAMANAN KENDARAAN • PELACAKAN REAL-TIME • PERLINDUNGAN 24 JAM •
                    &nbsp; KEAMANAN KENDARAAN • PELACAKAN REAL-TIME • PERLINDUNGAN 24 JAM • KEAMANAN KENDARAAN • PELACAKAN REAL-TIME • PERLINDUNGAN 24 JAM •
                </div>
            </div>
        </div>
    </div>

    <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
        <div class="w-200 h-200 border border-blue-600/20 rounded-full animate-[spin_60s_linear_infinite]"></div>
        <div class="absolute w-150 h-150 border border-dashed border-blue-900/40 rounded-full animate-[spin_40s_linear_infinite_reverse]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 pt-10">
        <div class="mb-32 flex flex-col lg:flex-row lg:items-end justify-between gap-10">
            <div class="max-w-2xl">
                <span class="text-blue-500 font-mono text-[10px] uppercase tracking-[0.8em] block mb-6">// SYSTEM_DEPLOYMENT_2026</span>
                <h3 class="text-6xl lg:text-8xl font-black text-white leading-none tracking-tighter uppercase">
                    FULL <span class="text-transparent" style="-webkit-text-stroke: 1px #444;">ACCESS.</span>
                </h3>
            </div>
            <div class="lg:text-right">
                <p class="text-neutral-500 font-mono text-[10px] uppercase tracking-[0.4em] leading-loose">
                    Encryption: active<br>
                    protocol: unified_v3<br>
                    status: ready_for_deployment
                </p>
            </div>
        </div>

        <div class="relative border-y border-neutral-900 bg-neutral-950/20 py-20 px-10">
            <div class="absolute top-0 left-0 w-2 h-2 bg-blue-600 shadow-[0_0_10px_#2563eb]"></div>
            <div class="absolute top-0 right-0 w-2 h-2 bg-neutral-800"></div>
            <div class="absolute bottom-0 left-0 w-2 h-2 bg-neutral-800"></div>
            <div class="absolute bottom-0 right-0 w-2 h-2 bg-blue-600 shadow-[0_0_10px_#2563eb]"></div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20 items-center">
                <div class="space-y-12">
                    <div class="group">
                        <span class="text-[9px] font-mono text-blue-500 block mb-2 uppercase tracking-widest italic">Node_01 //</span>
                        <h4 class="text-white font-bold uppercase tracking-[0.2em] text-sm mb-3">Precision Tracking</h4>
                        <p class="text-neutral-600 text-[10px] uppercase leading-relaxed tracking-wider">Interval 60 detik dengan akurasi koordinat < 5 meter.</p>
                    </div>
                    <div class="group">
                        <span class="text-[9px] font-mono text-blue-500 block mb-2 uppercase tracking-widest italic">Node_02 //</span>
                        <h4 class="text-white font-bold uppercase tracking-[0.2em] text-sm mb-3">Security Perimeter</h4>
                        <p class="text-neutral-600 text-[10px] uppercase leading-relaxed tracking-wider">Geofence cerdas dengan notifikasi push instan ke perangkat mobile.</p>
                    </div>
                </div>

                <div class="relative py-20 flex flex-col items-center justify-center text-center">
                    <div class="absolute inset-0 bg-blue-600/10 blur-[120px] rounded-full"></div>
                    <div class="relative z-10">
                        <span class="text-[10px] font-black text-neutral-600 uppercase tracking-[1em] mb-10 block">Standard_Investment</span>
                        <div class="relative inline-block mb-10">
                            <h4 class="text-[120px] font-black text-white leading-none italic tracking-tighter">350K</h4>
                            <span class="absolute -top-4 -right-8 bg-blue-600 text-white text-[9px] font-mono px-3 py-1 uppercase tracking-widest">Yearly</span>
                        </div>
                        <a href="https://wa.me/6281110002425" class="group relative flex flex-col items-center">
                            <div class="px-12 py-5 bg-white text-black text-[10px] font-black uppercase tracking-[0.8em] group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-xl">
                                Deploy_Now
                            </div>
                            <span class="mt-6 text-[8px] font-mono text-neutral-700 uppercase tracking-[0.5em] group-hover:text-blue-500 transition-colors">Confirm Handshake Protocol</span>
                        </a>
                    </div>
                </div>

                <div class="space-y-12 lg:text-right">
                    <div class="group">
                        <span class="text-[9px] font-mono text-blue-500 block mb-2 uppercase tracking-widest italic">// Node_03</span>
                        <h4 class="text-white font-bold uppercase tracking-[0.2em] text-sm mb-3">Intelligence Log</h4>
                        <p class="text-neutral-600 text-[10px] uppercase leading-relaxed tracking-wider">Arsip data perjalanan 30 hari tersimpan dalam server terenkripsi.</p>
                    </div>
                    <div class="group">
                        <span class="text-[9px] font-mono text-blue-500 block mb-2 uppercase tracking-widest italic">// Node_04</span>
                        <h4 class="text-white font-bold uppercase tracking-[0.2em] text-sm mb-3">Remote Lockdown</h4>
                        <p class="text-neutral-600 text-[10px] uppercase leading-relaxed tracking-wider">Kendali penuh pemutusan arus mesin via aplikasi (Relay Support).</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 border-l border-neutral-900 pl-10">
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
        </div>
    </div>
</section>
