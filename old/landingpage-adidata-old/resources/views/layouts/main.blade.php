<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- SEO Meta -->
    <meta name="google-site-verification" content="oVawq3LK6dZJTFkPpoUA5td-DdLsECZgUM6fA5umedk" />
    <meta name="description" content="PT. Adidata Global Sistem menghadirkan teknologi terbaru Chip Module untuk pelacakan kendaraan yang lebih efisien dibandingkan GPS konvensional. Ketahui keunggulannya dari segi ukuran, daya, sinyal, dan konektivitas." />
    <meta name="keywords" content="Adidata Global Sistem, PT. Adidata Global Sistem, chip module tracking, GPS vs chip, teknologi pelacakan terbaru, pelacak kendaraan, sinyal GSM, chip hemat daya, perangkat pelacak modern" />
    <meta name="author" content="PT. Adidata Global Sistem" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Chip Module oleh Adidata Global Sistem | Teknologi Tracking Masa Kini" />
    <meta property="og:description" content="Solusi pelacakan kendaraan modern dari Adidata Global Sistem. Bandingkan Chip Module dengan GPS dari segi efisiensi dan performa." />
    <meta property="og:image" content="https://product.agscorp.site/img/thumbnail-seo.webp" />
    <meta property="og:url" content="https://product.agscorp.site/" />
    <meta property="og:type" content="website" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Adidata Global Sistem - Chip Module vs GPS: Solusi Tracking Terbaik" />
    <meta name="twitter:description" content="Adidata Global Sistem mempersembahkan Chip Module sebagai alternatif efisien untuk GPS. Bandingkan performanya dalam pelacakan kendaraan." />
    <meta name="twitter:image" content="https://product.agscorp.site/img/thumbnail-seo.webp" />
    <!-- Title web -->
    <title>PT. Adidata Global Sistem</title>
    <!-- Favicon (Icon in Web Tab) -->
    <link rel="shortcut icon" href="{{ asset('img/3dlogowotxt.webp') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'" />
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- main css --}}
    <link rel="stylesheet" href="{{asset('css/main.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{asset('css/about.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{asset('css/microchip.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{asset('css/pricing.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="{{asset('css/contact.css')}}?v={{ time() }}">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarScroll" data-bs-offset="100" tabindex="0">
    <!-- Navbar Container Fixed -->
    <div class="navbar-container">
        <nav class="navbar navbar-expand-lg" id="navbarScroll">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="{{asset('img/3dlogowotxt.webp')}}" class="img-fluid" alt="Logo AGS" loading="lazy" decoding="async">
                    <div class="d-flex flex-column ms-2">
                        Adidata
                        <div class="gs">Global Sistem</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="d-none d-lg-flex">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#microchip">Chip</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#harga">Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>

                    <div class="get-started-container d-flex align-items-center justify-content-center ms-lg-5">
                        <a class="get-started text-decoration-none"
                            href="https://wa.me/6281110002425"
                            target="_blank" rel="noopener noreferrer">
                            <span class="gs-txt">Whatsapp</span><i class="fas fa-arrow-right ms-2"></i>
                        </a>    
                    </div>
                </div>
                
                <!-- Mobile - Only Get Started Button -->
                <div class="d-lg-none">
                    <div class="get-started-container ml-auto ml-lg-none">
                        <a class="get-started text-decoration-none"
                            href="https://wa.me/6281110002425"
                            target="_blank" rel="noopener noreferrer">
                            <span class="gs-txt">Get Started</span><i class="fas fa-arrow-right ms-2"></i>
                        </a>    
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main class="position-relative">
        @yield('content')
    </main>

    <footer class="footer-section">
        <div class="container">
            <div class="footer-simple">
                <div class="footer-brand">
                    <a href="/" class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('img/3dlogowotxt.webp')}}" class="img-fluid footer-logo" alt="Logo AGS">
                        <div class="d-flex flex-column ms-2">
                            Adidata Global Sistem
                        </div>
                    </a>
                    <div class="social-links d-flex align-items-center justify-content-center mt-3">
                        <a href="https://wa.me/6281110002425" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-copyright mt-4 text-center">
                    &copy; 2025 Adidata Global Sistem. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
