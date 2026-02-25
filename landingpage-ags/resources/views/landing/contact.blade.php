<section id="kontak" class="relative py-40 bg-black overflow-hidden border-t border-neutral-900">
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none"
        style="background-image: linear-gradient(#444 1px, transparent 1px), linear-gradient(90deg, #444 1px, transparent 1px); background-size: 50px 50px;">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="mb-24">
            <h2 class="text-7xl lg:text-[100px] font-black text-white leading-none uppercase tracking-tighter">
                HUBUNGI <br> <span class="text-transparent" style="-webkit-text-stroke: 1px #444;">OPERATOR.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-neutral-900">

            <div class="lg:col-span-4 border-r border-neutral-900 bg-neutral-950/50">

                <div class="p-10 border-b border-neutral-900 group/address transition-colors hover:bg-black/30">
                    <h3
                        class="text-white font-bold uppercase tracking-widest text-xs mb-4 underline underline-offset-8 decoration-blue-500/10">
                        Alamat Kantor</h3>
                    <p
                        class="text-neutral-500 text-sm leading-relaxed font-light uppercase group-hover/address:text-white">
                        Cedapari. Jl. SMEA 6 No.15, Kramat Jati,
                        <br>Jakarta Timur DKI Jakarta 13630
                    </p>
                </div>

                <div class="p-10 border-b border-neutral-900 space-y-6 transition-colors hover:bg-black/30">
                <x-contact-info-link label="WhatsApp Contact" value="0811-1000-2425" href="https://wa.me/6281110002425" />
                <x-contact-info-link label="Office Line" value="(021) 80885357" href="tel:02180885357" />
                <x-contact-info-link label="Customer Service" value="cs@adidataglobalsistem.site" href="mailto:cs@adidataglobalsistem.site" />
                <x-contact-info-link label="Support Teknis" value="help@adidataglobalsistem.site" href="mailto:help@adidataglobalsistem.site" />
            </div>

                <div class="p-10 border-b lg:border-b-0 border-neutral-900 bg-black/20">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-[9px] font-mono text-white uppercase tracking-widest italic">Jam
                            Operasional</span>
                    </div>
                    <div class="space-y-3 text-[10px] font-mono text-neutral-400 uppercase tracking-[0.2em]">
                        <div class="flex justify-between border-b border-neutral-900/50 pb-2"><span>Senin — Jumat</span>
                            <span class="text-neutral-200">08:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between border-b border-neutral-900/50 pb-2"><span>Sabtu</span> <span
                                class="text-neutral-200">08:00 - 14:00</span></div>
                        <div class="flex justify-between text-red-600/60"><span>Minggu / Libur</span> <span
                                class="font-black">Tutup</span></div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 p-10 lg:p-14 bg-black">
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-white uppercase tracking-tight mb-2 italic">Kirim Pesan</h3>
                <p class="text-neutral-600 text-xs font-mono uppercase tracking-widest leading-loose">Lengkapi form untuk terhubung.</p>
            </div>

            <form action="{{ route('mail.send') }}" method="POST" class="space-y-12">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <x-contact-input label="Nama Lengkap" name="name" placeholder="Masukkan nama" :required="true" />
                    <x-contact-input label="Alamat Email" name="email" type="email" placeholder="email@domain.com" :required="true" />
                </div>

                <x-contact-input label="Subjek Pesan" name="subject" placeholder="Tentang apa pesan anda?" required />
                
                <x-contact-input label="Pesan Anda" name="message" type="textarea" placeholder="Tuliskan detail kebutuhan Anda..." :required="true" />

                <x-landing-button type="submit" :rounded="false" class="w-full py-6">
                    Kirim Pesan
                </x-landing-button>
            </form>
        </div>
        </div>

        <div class="mt-12 border border-neutral-900 p-2 bg-neutral-950 group">
            <div
                class="h-100 w-full relative overflow-hidden grayscale contrast-125 group-hover:grayscale-0 transition-all duration-1000">
                <x-map-cedapari />
                <div
                    class="absolute bottom-10 left-10 p-6 bg-black/90 backdrop-blur-xl border-l-2 border-blue-700/50 pointer-events-none">
                    <span
                        class="text-[8px] font-mono text-neutral-600 hover:text-white uppercase block mb-1 tracking-[0.3em]">Titik
                        Kordinat</span>
                    <span class="text-xs text-neutral-600 hover:text-white font-bold tracking-widest">-6.2520464,
                        106.8712166</span>
                </div>
            </div>
        </div>
    </div>
</section>
