<!-- Contact Section -->
<section id="kontak" class="contact-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" data-aos="fade-up">Hubungi Kami</h2>
            <p class="lead mx-auto" style="max-width: 700px;" data-aos="fade-up" data-aos-delay="100">
                Kami siap membantu dan menjawab pertanyaan apa pun yang mungkin Anda miliki.
                Hubungi kami melalui salah satu saluran di bawah ini.
            </p>
        </div>

        <!-- Contact Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="150">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="200">Alamat</h3>
                    <p data-aos="fade-up" data-aos-delay="250">
                        Cedapari<br>
                        Jl. SMEA 6 No.15,Kec. Kramat jati,<br>
                        Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                {{-- <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="250">No. Telp</h3>
                    <p data-aos="fade-up" data-aos-delay="350">Whatsapp: 0811-1000-2425</p>
                </div> --}}
                <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="250">No. Telp</h3>

                    <p data-aos="fade-up" data-aos-delay="300">
                        <strong><i class="fab fa-whatsapp me-1" style="font-size: 1.2rem;"></i> WhatsApp:</strong><br>
                        <a href="https://wa.me/6281110002425" target="_blank">0811-1000-2425</a>
                    </p>

                    <p data-aos="fade-up" data-aos-delay="350">
                        <strong><i class="fas fa-phone me-1" style="font-size: 1.2rem;"></i> Kantor:</strong><br>
                        (021) 80885357
                    </p>
                </div>

            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                {{-- <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="250">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="300">Alamat Email</h3>
                    <p data-aos="fade-up" data-aos-delay="350">cs@adidataglobalsistem.site</p>
                    <p data-aos="fade-up" data-aos-delay="350">help@adidataglobalsistem.site</p>
                </div> --}}
                <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="250">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="300">Alamat Email</h3>

                    <p data-aos="fade-up" data-aos-delay="350">
                        <strong><i class="fas fa-headset me-1"></i> Customer Service (24 Jam):</strong><br>
                        <a href="mailto:cs@adidataglobalsistem.site" style="font-size: 1.1rem;">cs@adidataglobalsistem.site</a>
                    </p>

                    <p data-aos="fade-up" data-aos-delay="400">
                        <strong><i class="fas fa-info-circle me-1"></i> Support Teknis (24 Jam):</strong><br>
                        <a href="mailto:help@adidataglobalsistem.site"  style="font-size: 1.1rem;">help@adidataglobalsistem.site</a>
                    </p>
                </div>

            </div>

            {{-- <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                <div class="contact-card h-100">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="350">Jam Kerja</h3>
                    <p data-aos="fade-up" data-aos-delay="400">Senin-Jum'at: 08:00 - 17:00</p>
                    <p data-aos="fade-up" data-aos-delay="450">Sabtu: 08:00 - 14:00</p>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                <div class="contact-card h-100"style="font-size: 1.1rem;">
                    <div class="contact-icon" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 data-aos="fade-up" data-aos-delay="350">Jam Operasional</h3>
                    <p><strong><i class="fas fa-building"></i> Kantor</strong><br>
                        Senin - Jum'at: 08:00 - 17:00<br>
                        Sabtu: 08:00 - 14:00<br>
                        Minggu & Tanggal Merah: <span class="text-danger">Tutup</span></p>
                </div>
            </div>

        </div>

        <!-- Form and Map -->
        <div class="row g-4">
            <!-- Form Column -->
            <div class="col-lg-6">
                <div class="form-container" data-aos="fade-right">

                    <h3 class="form-title" data-aos="fade-up" data-aos-delay="100">Kirim Pesan</h3>
                    <form action="{{ route('mail.send') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control text-white"
                                        placeholder="Masukkan nama Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="form-group">
                                    <label class="form-label">Alamat Email</label>
                                    <input type="email" name="email" class="form-control text-white"
                                        placeholder="Masukkan email Anda" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" data-aos="fade-up" data-aos-delay="250">
                            <label class="form-label">Subjek</label>
                            <input type="text" name="subject" class="form-control text-white"
                                placeholder="Tentang apa pesan Anda?">
                        </div>

                        <div class="form-group" data-aos="fade-up" data-aos-delay="300">
                            <label class="form-label">Pesan Anda</label>
                            <textarea name="message" class="form-control text-white" rows="5"
                                placeholder="Bagaimana kami bisa membantu Anda?" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn w-100" data-aos="fade-up" data-aos-delay="350">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map Column -->
            <div class="col-lg-6">
                <div class="map-container h-100" data-aos="fade-left">
                    <iframe title="Location map showing our office"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d495.75747496348515!2d106.8700741!3d-6.2558527!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f255721a3c93%3A0x3057daa731c119b8!2sCedapari!5e0!3m2!1sid!2sid!4v1745581694380!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="full-size-map rounded-3">
                    </iframe>
                    <div class="map-overlay" data-aos="fade-up" data-aos-delay="100">
                        <div class="address">
                            Jl. SMEA 6 No.15, RT.1/RW.9, Kramat Jati, Kota Jakarta Timur, DKI Jakarta 13630
                        </div>
                        <button class="directions-btn" aria-label="Get Directions"
                            onclick="window.open(
                                'https://www.google.com/maps/dir//Cedapari,+Jl.+SMEA+6+No.15,+RT.1%2FRW.9,+Kramat+Jati,+Kec.+Kramat+jati,+Kota+Jakarta+Timur,+Daerah+Khusus+Ibukota+Jakarta+13630/@-6.2558527,106.8700741,20z/data=!4m17!1m7!3m6!1s0x2e69f255721a3c93:0x3057daa731c119b8!2sCedapari!8m2!3d-6.2560228!4d106.8705837!16s%2Fg%2F1ptxgl9n8!4m8!1m0!1m5!1m1!1s0x2e69f255721a3c93:0x3057daa731c119b8!2m2!1d106.8705898!2d-6.2559942!3e9?entry=ttu&g_ep=EgoyMDI1MDQyMi4wIKXMDSoASAFQAw%3D%3D',
                                '_blank');"
                            data-aos="fade-up" data-aos-delay="150">
                            <i class="fas fa-directions"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
