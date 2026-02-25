<section id="beranda" class="relative min-h-screen w-full bg-black flex items-center pt-20 overflow-hidden">

    <div class="absolute inset-0 opacity-[0.15]"
        style="background-image: linear-gradient(#333 1px, transparent 1px), linear-gradient(90deg, #333 1px, transparent 1px); background-size: 80px 80px;">
    </div>

    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-200 h-125 bg-blue-500/10 rounded-full blur-[120px] pointer-events-none">
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <div class="lg:col-span-6 space-y-8">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5">
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/60">New Generation
                        V2.0</span>
                </div>

                <h1 class="text-6xl lg:text-[90px] font-bold tracking-tight text-white leading-[0.95]">
                    Secure. <br>
                    <span class="text-white/30 italic">Invisible.</span> <br>
                    Reliable.
                </h1>

                <p class="max-w-md text-slate-400 text-lg font-light leading-relaxed">
                    Proteksi kendaraan mutakhir melalui teknologi <b>Chip Module</b>. Lebih kecil dari GPS, lebih kuat
                    dari jammer.
                </p>

                <div class="flex items-center gap-6 pt-4">
                    <x-landing-button href="https://wa.me/6281110002425" :rounded="true">
                        Buy Now
                    </x-landing-button>
                    <div class="h-12 w-px bg-white/10 hidden sm:block"></div>
                    <div class="hidden sm:block">
                        <p class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Pricing start from</p>
                        <p class="text-white font-bold tracking-tighter italic font-roboto">IDR 350K</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="relative group">

                    <div
                        class="overflow-hidden rounded-3xl border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.5)] bg-neutral-900">
                        <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=2070&auto=format&fit=crop"
                            alt="Luxury Car Dark"
                            class="w-full h-auto object-cover grayscale opacity-60 transition-all duration-1000 group-hover:grayscale-0 group-hover:opacity-100">
                    </div>

                    <x-home-floating-card class="-bottom-12 -left-24" label="Technology" title="Signal Based Tracking"
                        icon="fa-solid fa-microchip" color="blue" />

                    <x-home-floating-card class="-top-12 -right-24 delay-75" label="Efficiency" title="Ultra Low Power"
                        icon="fa-solid fa-bolt" color="emerald" />
                </div>
            </div>

        </div>
    </div>
</section>
