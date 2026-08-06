<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        @include('layouts.navbar')
    </nav>

    <!-- Tentang -->
    <section id="tentang">
    <div class="container">

        @if($tentang)

            <div class="text">

                <img src="{{ asset('img/p.png') }}"
                     height="100"
                     width="100">

                <h1>{{ $tentang->judul }}</h1>

                <br>

                <td>
    {!! $tentang->isi !!}
</td>

            </div>

            <div class="gambar">

                @if($tentang->gambar)

                    <img src="{{ asset($tentang->gambar ??'') }}"
                         alt="{{ $tentang->judul }}">

                @else

                    <img src="{{ asset('img/orang.png') }}"
                         alt="Default">

                @endif

            </div>

        @else

            <div class="text">

                <img src="{{ asset('img/p.png') }}"
                     height="100"
                     width="100">

                <h1>Tentang Kami</h1>

                <p>
                    Data Tentang Kami belum tersedia.
                </p>

            </div>

        @endif

    </div>
    </section>

    <!-- Lokasi -->
    <section id="location">

   
    <div class="lk-main-wrapper">

        <div class="lk-header-banner">
            <h1>Lokasi<br>Kami</h1>
            <div class="lk-arrow-circle">➔</div>
        </div>

        <div class="lk-container">

            <div class="lk-location-grid">

                @foreach($locations as $location)

                    <div class="lk-location-item">

                        <div class="lk-location-title">

                            <svg class="lk-pin-icon" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>

                            {{ $location->nama_kota }}

                        </div>

                        <div class="lk-location-address">
                            {!! $location->alamat !!}
                           
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
 </section>

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
    <footer class="printex-footer">
        @include('layouts.footer')
    </footer>

</body>
</html>