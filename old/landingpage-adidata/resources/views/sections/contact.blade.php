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
                    <p class="text-neutral-500 text-sm leading-relaxed font-light uppercase group-hover/address:text-white">
                        Cedapari. Jl. SMEA 6 No.15, Kramat Jati,
                        <br>Jakarta Timur DKI Jakarta 13630
                    </p>
                </div>

                <div class="p-10 border-b border-neutral-900 group transition-colors hover:bg-black/30">
                    <div class="space-y-6">
                        <a href="https://wa.me/6281110002425" class="block group/link">
                            <span class="text-neutral-600 text-[10px] uppercase block mb-1">WhatsApp Protocol</span>
                            <span
                                class="text-neutral-400 font-medium tracking-tight text-base group-hover/link:text-white transition-colors break-all">0811-1000-2425</span>
                        </a>
                        <a href="tel:02180885357" class="block group/link">
                            <span class="text-neutral-600 text-[10px] uppercase block mb-1">Office Line</span>
                            <span
                                class="text-neutral-400 font-medium tracking-tight text-base group-hover/link:text-white transition-colors break-all">(021)
                                80885357</span>
                        </a>
                        <a href="mailto:cs@adidataglobalsistem.site" class="block group/link">
                            <span class="text-neutral-600 text-[10px] uppercase block mb-1">Customer Service</span>
                            <span
                                class="text-neutral-400 font-medium tracking-tight text-base group-hover/link:text-white transition-colors break-all">cs@adidataglobalsistem.site</span>
                        </a>
                        <a href="mailto:help@adidataglobalsistem.site" class="block group/link">
                            <span class="text-neutral-600 text-[10px] uppercase block mb-1">Support Teknis</span>
                            <span
                                class="text-neutral-400 font-medium tracking-tight text-base group-hover/link:text-white transition-colors break-all">help@adidataglobalsistem.site</span>
                        </a>
                    </div>
                </div>

                <div class="p-10 border-b lg:border-b-0 border-neutral-900 bg-black/20">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="text-[9px] font-mono text-white uppercase tracking-widest italic">Jam Operasional</span>
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

            <div class="lg:col-span-8 p-10 lg:p-14 relative bg-black">
                <div class="mb-16">
                    <h3 class="text-2xl font-bold text-white uppercase tracking-tight mb-2 italic">Kirim Pesan
                    </h3>
                    <p class="text-neutral-600 text-xs font-mono uppercase tracking-widest leading-loose">Lengkapi
                        form di bawah ini untuk mengirim pesan.</p>
                </div>

                <form action="{{ route('mail.send') }}" method="POST" class="space-y-12">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div class="relative group">
                            <label
                                class="text-[8px] font-mono text-neutral-600 uppercase tracking-[0.4em] block mb-2 transition-colors group-focus-within:text-blue-500">Nama Lengkap</label>
                            <input type="text" name="name"
                                class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em]"
                                placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="relative group">
                            <label
                                class="text-[8px] font-mono text-neutral-600 uppercase tracking-[0.4em] block mb-2 transition-colors group-focus-within:text-blue-500">Alamat Email</label>
                            <input type="email" name="email"
                                class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em]"
                                placeholder="email@domain.com" required>
                        </div>
                    </div>

                    <div class="relative group">
                        <label
                            class="text-[8px] font-mono text-neutral-600 uppercase tracking-[0.4em] block mb-2 transition-colors group-focus-within:text-blue-500">Subjek pesan</label>
                        <input type="text" name="subject"
                            class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em]"
                            placeholder="Tentang apa pesan anda?" required>
                    </div>

                    <div class="relative group">
                        <label
                            class="text-[8px] font-mono text-neutral-600 uppercase tracking-[0.4em] block mb-2 transition-colors group-focus-within:text-blue-500">Pesan Anda</label>
                        <textarea name="message" rows="4"
                            class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em] resize-none"
                            placeholder="Tuliskan detail kebutuhan atau pertanyaan Anda..." required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full px-20 py-6 bg-white text-black text-[10px] font-black uppercase tracking-[0.5em] hover:bg-blue-600 hover:text-white transition-all transform hover:-translate-y-1 active:translate-y-0">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-12 border border-neutral-900 p-2 bg-neutral-950 group">
            <div
                class="h-100 w-full relative overflow-hidden grayscale contrast-125 group-hover:grayscale-0 transition-all duration-1000">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0886193799865!2d106.8712166!3d-6.2520464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3aa16327e5d%3A0xc39116c905586675!2sJl.%20SMEA%206%20No.15%2C%20RT.1%2FRW.9%2C%20Kramat%20Jati%2C%20Kec.%20Kramat%20jati%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013630!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    class="w-full h-full border-0" allowfullscreen="" loading="lazy">
                </iframe>
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
