<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRINTEX | Beranda</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->
    <nav>
        @include('layouts.navbar')
    </nav>


    <!-- =========================
         SLIDER
    ========================== -->
    <section class="slider-container">

        <!-- Tombol Previous -->
        <button
            type="button"
            class="prev"
            onclick="prevSlide()"
        >
            ❮
        </button>


        <!-- Slider yang digeser -->
        <div class="slider" id="slider">

            @forelse($sliderBeranda as $slider)

                <div class="slide">

                    <img
                        src="{{ asset('uploads/slider/' . $slider->gambar) }}"
                        alt="{{ $slider->judul }}"
                    >

                </div>

            @empty

                <div class="slide">
                    <h3>Tidak ada slider</h3>
                </div>

            @endforelse

        </div>


        <!-- Tombol Next -->
        <button
            type="button"
            class="next"
            onclick="nextSlide()"
        >
            ❯
        </button>

    </section>



    <!-- =========================
         TENTANG KAMI
    ========================== -->
    @if(empty($keyword))

        <section class="container">

            <!-- Bagian Text -->
            <div class="text">

                <img
                    src="{{ asset('img/p.png') }}"
                    alt="Logo P"
                    height="100"
                    width="100"
                >

                <h1>
                    Tentang<br>
                    Kami
                </h1>

                <p>
                    Printex merupakan perusahaan yang bergerak di bidang jasa
                    printing textile, sablon digital, dan kaos premium.
                    Kami menyediakan solusi cetak kain berkualitas tinggi
                    untuk kebutuhan industri fashion, konveksi,
                    hingga usaha kecil dan menengah.
                </p>

            </div>


            <!-- Bagian Gambar -->
            <div class="gambar">

                <img
                    src="{{ asset('img/orang.png') }}"
                    alt="Tentang Kami Printex"
                >

            </div>

        </section>

    @endif



    <!-- =========================
         HASIL SABLON / SECOUNDS
    ========================== -->
    @if($secounds)

        <section
            class="secounds-section"
            id="secound"
        >

            <!-- Gambar Section -->
            @if($secounds->gambar)

                <img
                    src="{{ asset('uploads/secound/' . $secounds->gambar) }}"
                    alt="{{ $secounds->judul }}"
                    style="
                        width: 100%;
                        height: 400px;
                        object-fit: cover;
                    "
                >

            @endif


            <!-- Content -->
            <div class="pts-section-container">

                <!-- Judul -->
                <div class="pts-left-title">

                    <h2 class="pts-main-heading">
                        {{ $secounds->judul }}
                    </h2>

                </div>


                <!-- Deskripsi -->
                <div class="pts-right-description">

                    {!! $secounds->isi !!}

                </div>

            </div>

        </section>

    @endif



    <!-- =========================
         OUR VALUES
    ========================== -->
    @if($ourvalues->count())

        <section
            class="ov-section-wrapper"
            id="ourvalue"
        >

            <!-- =========================
                 BAGIAN KIRI
            ========================== -->
            <div class="ov-left-side">

                <!-- Gambar -->
                <div class="ov-image-container">

                    @if($gambar)

                        <img
                            class="ov-profile-img"
                            src="{{ asset($gambar->gambar) }}"
                            alt="Our Values"
                        >

                    @endif

                </div>


                <!-- Judul -->
                <div class="ov-title-container">

                    <h2 class="ov-main-title">
                        Our Values
                    </h2>

                    <div class="ov-arrow-button">
                        ➔
                    </div>

                </div>

            </div>



            <!-- =========================
                 BAGIAN KANAN
            ========================== -->
            <div class="ov-right-side">

                @foreach($ourvalues as $item)

                    <div
                        class="ov-card
                        {{ $loop->last ? 'ov-card-fullwidth' : '' }}"
                    >

                        <!-- Judul -->
                        <h3 class="ov-card-title">
                            {{ $item->judul }}
                        </h3>


                        <!-- Isi -->
                        <p class="ov-card-text">
                            {!! $item->isi !!}
                        </p>

                    </div>


                    <!-- Divider -->
                    @if($loop->iteration == 2 || $loop->iteration == 4)

                        <hr class="ov-divider">

                    @endif

                @endforeach

            </div>

        </section>

    @endif


       <div class="floating-menu" id="floatingMenu">
    <a href="https://wa.me/0821-3333-9489"
    class="floating-item whatsapp" target="_blank">
    <i class="fab fa-whatsapp"></i>
    </a>

    <a href="https://instagram.com/printex.salatiga"
    class="floating-item instagram" target="_blank">
    <i class="fab fa-instagram"></i>
    </a>

    <button class="floating-button" id="floatingButton">
        <i class="fas fa-comment-dots"></i>
    </button>
  </div>

  <script>

const floatingMenu = document.getElementById('floatingMenu');
const floatingButton = document.getElementById('floatingButton');

let isDragging = false;
let startX;
let startY;
let startLeft;
let startTop;


/* ==========================
   KLIK TOMBOL
========================== */

floatingButton.addEventListener('click', function () {

    if (!isDragging) {
        floatingMenu.classList.toggle('active');
    }

});


/* ==========================
   MULAI DRAG
========================== */

floatingButton.addEventListener('pointerdown', function(e) {

    isDragging = false;

    startX = e.clientX;
    startY = e.clientY;

    const rect = floatingMenu.getBoundingClientRect();

    startLeft = rect.left;
    startTop = rect.top;

    floatingButton.setPointerCapture(e.pointerId);

});


/* ==========================
   GERAKKAN TOMBOL
========================== */

floatingButton.addEventListener('pointermove', function(e) {

    if (!floatingButton.hasPointerCapture(e.pointerId)) {
        return;
    }

    const dx = e.clientX - startX;
    const dy = e.clientY - startY;

    if (Math.abs(dx) > 5 || Math.abs(dy) > 5) {
        isDragging = true;
    }

    if (isDragging) {

        let newLeft = startLeft + dx;
        let newTop = startTop + dy;

        const maxLeft =
            window.innerWidth - floatingMenu.offsetWidth;

        const maxTop =
            window.innerHeight - floatingMenu.offsetHeight;

        newLeft = Math.max(
            0,
            Math.min(newLeft, maxLeft)
        );

        newTop = Math.max(
            0,
            Math.min(newTop, maxTop)
        );

        floatingMenu.style.left = newLeft + 'px';
        floatingMenu.style.top = newTop + 'px';

        floatingMenu.style.right = 'auto';
        floatingMenu.style.bottom = 'auto';
    }

});


/* ==========================
   SELESAI DRAG
========================== */

floatingButton.addEventListener('pointerup', function(e) {

    floatingButton.releasePointerCapture(e.pointerId);

    setTimeout(() => {
        isDragging = false;
    }, 50);

});

</script>


    <!-- =========================
         FOOTER
    ========================== -->
    <footer class="printex-footer">

        @include('layouts.footer')

    </footer>


    <!-- =========================
         JAVASCRIPT SLIDER
    ========================== -->
    <script>

        // Ambil elemen slider
        const slider = document.getElementById('slider');

        // Ambil semua slide
        const slides = document.querySelectorAll('.slide');

        // Posisi slide saat ini
        let index = 0;


        // =========================
        // NEXT SLIDE
        // =========================
        function nextSlide() {

            // Jika hanya ada 1 slide,
            // jangan lakukan perpindahan
            if (slides.length <= 1) {
                return;
            }

            // Pindah ke slide berikutnya
            index++;

            // Jika sudah sampai slide terakhir,
            // kembali ke slide pertama
            if (index >= slides.length) {
                index = 0;
            }

            // Geser slider
            slider.style.transform =
                `translateX(-${index * 100}%)`;

        }


        
        function prevSlide() {

            // Jika hanya ada 1 slide,
            // jangan lakukan perpindahan
            if (slides.length <= 1) {
                return;
            }

            
            index--;

            if (index < 0) {
                index = slides.length - 1;
            }

            // Geser slider
            slider.style.transform =
                `translateX(-${index * 100}%)`;

        }


      
        // AUTO SLIDE
       
        if (slides.length > 1) {

            setInterval(function () {

                nextSlide();

            }, 4000);

        }

    </script>

</body>

</html>