document.addEventListener('DOMContentLoaded', function() {
    // Variabel untuk carousel
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    const carouselContainer = document.querySelector('.hero-carousel');

    let currentIndex = 0;
    let autoSlideInterval;
    let touchStartX = 0;
    let touchEndX = 0;
    const totalItems = carouselItems.length;
    const SWIPE_THRESHOLD = 50; // Minimal jarak swipe dalam pixel

    // Fungsi untuk menampilkan slide
    function showSlide(index) {
        // Validasi index
        if (index < 0) index = totalItems - 1;
        if (index >= totalItems) index = 0;

        // Sembunyikan semua slide
        carouselItems.forEach(item => item.classList.remove('active'));

        // Tampilkan slide yang dipilih
        carouselItems[index].classList.add('active');

        // Update indicators
        indicators.forEach(indicator => indicator.classList.remove('active'));
        indicators[index].classList.add('active');

        currentIndex = index;
    }

    // Fungsi untuk slide berikutnya
    function nextSlide() {
        showSlide((currentIndex + 1) % totalItems);
    }

    // Fungsi untuk slide sebelumnya
    function prevSlide() {
        showSlide((currentIndex - 1 + totalItems) % totalItems);
    }

    // Fungsi untuk memulai auto slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 8000);
    }

    // Fungsi untuk reset auto slide timer
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Fungsi untuk handle swipe/touch
    function handleTouchStart(e) {
        touchStartX = e.changedTouches[0].screenX;
    }

    function handleTouchEnd(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipeGesture();
    }

    function handleSwipeGesture() {
        const difference = touchStartX - touchEndX;

        // Swipe ke kiri (next slide)
        if (difference > SWIPE_THRESHOLD) {
            nextSlide();
        }
        // Swipe ke kanan (prev slide)
        else if (difference < -SWIPE_THRESHOLD) {
            prevSlide();
        }

        // Reset auto slide setelah swipe manual
        resetAutoSlide();
    }

    // Event listeners untuk tombol
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        prevSlide();
        resetAutoSlide();
    });

    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        nextSlide();
        resetAutoSlide();
    });

    // Event listeners untuk indicators
    indicators.forEach(indicator => {
        indicator.addEventListener('click', function(e) {
            e.preventDefault();
            const slideTo = parseInt(this.getAttribute('data-slide-to'));
            if (slideTo !== currentIndex) {
                showSlide(slideTo);
                resetAutoSlide();
            }
        });
    });

    // Touch event listeners untuk mobile swipe
    carouselContainer.addEventListener('touchstart', handleTouchStart, { passive: true });
    carouselContainer.addEventListener('touchend', handleTouchEnd, { passive: true });

    // Hentikan auto slide saat hover/touch
    carouselContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
    carouselContainer.addEventListener('touchstart', () => clearInterval(autoSlideInterval), { passive: true });

    // Lanjutkan auto slide saat mouse leave/touch end
    carouselContainer.addEventListener('mouseleave', startAutoSlide);
    carouselContainer.addEventListener('touchend', startAutoSlide, { passive: true });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });

    // Inisialisasi carousel
    function initCarousel() {
        showSlide(0);
        startAutoSlide();

        // Deteksi perangkat mobile
        if ('ontouchstart' in window || navigator.maxTouchPoints) {
            // Optimasi untuk perangkat touch
            carouselContainer.style.touchAction = 'pan-y';
        }
    }

    // Jalankan carousel
    initCarousel();

    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            // Bootstrap 5 pakai class 'fade' + 'show' jadi kita bisa hapus 'show' agar fade out
            alert.classList.remove('show');
            alert.classList.add('hide'); // kamu bisa bikin css animasi kalau mau
            // atau langsung hilangkan element-nya
            setTimeout(() => alert.remove(), 500); // tunggu animasi fade out
        });
    }, 3000); // 3000 ms = 3 detik
});