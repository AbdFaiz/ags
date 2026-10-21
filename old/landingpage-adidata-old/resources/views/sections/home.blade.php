<!-- Hero Carousel -->
<section id="beranda" class="hero-carousel">

    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Succes !</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-lg-6 h-100">
                        <div class="img-container h-100" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('img/home-slide1.webp') }}" alt="Tracking Device" class="car-img"
                                loading="eager">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="carousel-content">
                            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="150">Chips <span
                                    class="highlight-word">Module</span></h1>
                            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Solusi Pelacak Kendaraan
                                Tersembunyi yang Efisien dan Terjangkau.
                                Chips Module adalah perangkat kecil, cerdas, dan hemat daya yang dirancang untuk
                                melindungi kendaraan Anda dari pencurian. Menggunakan teknologi komunikasi seluler
                                terkini, alat ini mampu bekerja secara tersembunyi namun andal dalam memantau posisi
                                kendaraan. Inovatif dan praktis — solusi ideal untuk keamanan kendaraan Anda tanpa
                                ribet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 h-100">
                        <div class="img-container h-100" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('img/home-slide2.webp') }}" alt="Car" class="car-img"
                                loading="eager">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="carousel-content">
                            <h1 class="hero-title sld2" data-aos="fade-up" data-aos-delay="150">Temukan kendaraan anda
                                sebelum <span class="highlight-word">Terlambat</span>
                            </h1>
                            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Chips Module adalah alat
                                pelacak mini yang tersembunyi dan hemat daya, menggunakan sinyal GSM via SMS tanpa paket
                                data. Cukup dengan paket SMS Telkomsel 1 tahun, alat ini bisa melacak lokasi lewat info
                                BTS. Start from <code>Rp350.000</code> sudah termasuk SIM dan masa aktif setahun.</p>

                            <div class="d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <!-- <a href="{{ url('/services') }}" class="btn-video mb-2 mb-lg-0">
                                    Tentang Produk
                                </a> -->
                                <a href="#kontak" class="btn-video">
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Controls - Improved for mobile visibility -->
    <div class="carousel-control prev" id="prevSlide" data-aos="fade-right" data-aos-delay="400">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="carousel-control next" id="nextSlide" data-aos="fade-left" data-aos-delay="400">
        <i class="fas fa-chevron-right"></i>
    </div>

    <!-- Carousel Indicators - Now visible on mobile -->
    <div class="carousel-indicators" id="carouselIndicators">
        <div class="carousel-indicator active" data-slide-to="0"></div>
        <div class="carousel-indicator" data-slide-to="1"></div>
    </div>
</section>

<script src="{{ asset('js/home.js') }}"></script>
