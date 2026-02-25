<x-landing-layout>
    <section class="relative pt-40 pb-40 bg-black overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-20 pointer-events-none">
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_#2563eb_0%,_transparent_70%)] blur-[120px]">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            @php
                $primary = $products->where('is_primary', true)->first();
                $others = $products->where('is_primary', false);
            @endphp

            {{-- HEADER SECTION --}}
            <div class="mb-24">
                <h2 class="text-7xl lg:text-[100px] font-black text-white leading-none uppercase tracking-tighter">
                    PRODUK <br> <span class="text-transparent" style="-webkit-text-stroke: 1px #444;">KAMI.</span>
                </h2>
                <div class="flex items-center gap-6 mt-8">
                    <div class="h-px w-24 bg-blue-600/80 shadow-[0_0_10px_#2563eb]"></div>
                    <p class="text-neutral-400 uppercase tracking-[0.4em] text-[11px] leading-none">
                        Sistem Proteksi Kendaraan Generasi Terbaru
                    </p>
                </div>

            </div>

            {{-- PRIMARY PRODUCT --}}
            @if ($primary)
                <div class="relative mb-40 group">
                    <div
                        class="grid lg:grid-cols-12 gap-0 border border-neutral-900 bg-neutral-950/30 backdrop-blur-sm">
                        <div class="absolute -top-1 -left-1 w-4 h-4 border-t-2 border-l-2 border-blue-600"></div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 border-b-2 border-r-2 border-blue-600"></div>

                        <div
                            class="lg:col-span-7 overflow-hidden relative aspect-video lg:aspect-auto border-b lg:border-b-0 lg:border-r border-neutral-900">
                            <img src="{{ asset('storage/' . $primary->image) }}"
                                class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent lg:hidden"></div>
                        </div>

                        <div class="lg:col-span-5 p-12 lg:p-16 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="text-neutral-500 font-mono text-[10px] group-hover:text-white transition uppercase tracking-[0.5em]">Primary
                                    Module</span>
                            </div>

                            <h3
                                class="text-4xl lg:text-5xl font-black text-white uppercase mb-8 leading-tight tracking-tighter">
                                {{ $primary->name }}
                            </h3>

                            <p
                                class="text-neutral-400 text-sm font-light leading-relaxed mb-12 border-l border-neutral-800 pl-6 uppercase tracking-wider">
                                {{ $primary->description }}
                            </p>

                            <x-landing-button
                                href="https://wa.me/6281110002425?text={{ urlencode('Info unit primary: ' . $primary->name) }}"
                                target="_blank" :rounded="false" class="!w-full">
                                Konsultasi Pemasangan
                            </x-landing-button>
                        </div>
                    </div>
                </div>
            @endif

            {{-- OTHERS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($others as $product) 
                   <div class="group relative border border-neutral-800 p-4 hover:border-neutral-500">
                        <div class="relative aspect-square mb-8 bg-neutral-900 border border-neutral-800 p-2 group-hover:border-blue-600/50 transition-all duration-500">
                            <div class="w-full h-full overflow-hidden relative">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    class="w-full h-full object-cover grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700">
                            </div>
                            
                            <div class="absolute -top-1 -right-1 w-6 h-6 border-t-2 border-r-2 border-blue-600 opacity-0 group-hover:opacity-100 transition-all"></div>
                        </div>

                        <h4 class="text-neutral-500 font-bold text-2xl uppercase mb-3 tracking-tighter group-hover:text-white transition-colors">
                            {{ $product->name }}
                        </h4>
                        <p class="text-neutral-500 text-[10px] leading-relaxed uppercase tracking-widest mb-8 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <x-landing-button
                            href="https://wa.me/6281110002425?text={{ urlencode('Info unit: ' . $product->name) }}"
                            target="_blank" :rounded="false" class="!w-full">
                            Cek Spesifikasi
                        </x-landing-button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed bottom-10 right-10 bg-red-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 font-mono text-[10px] uppercase tracking-widest border border-red-400">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i> {{ session('error') }}
        </div>
    @endif
</x-landing-layout>
