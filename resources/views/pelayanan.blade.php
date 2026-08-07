<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINTEX | Beranda</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pel.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        @include('layouts.navbar')
    </nav>

   @include('layouts.slider')

    <!-- LAYANAN SECTION -->
    <section id="service" class="printex-section">
        <div class="printex-top">
            <div class="printex-left">
                <div class="printex-logo">
                    <img src="{{ asset('img/p.png') }}" alt="Logo">
                </div>
                <div class="printex-title">
                    <h1>Produk<br>Layanan</h1>
                    <div class="printex-arrow">
                        <img src="{{ asset('img/panahkebawah.png') }}" alt="Panah">
                    </div>
                </div>
            </div>
            <div class="printex-right">
                <div class="printex-desc">
                    Sebagai penyedia solusi cetak tekstil terpercaya, Printex menawarkan berbagai layanan dengan kualitas terbaik yang disesuaikan untuk kebutuhan industri fashion, konveksi, hingga bisnis skala kecil dan menengah. Dengan dukungan teknologi modern dan tenaga profesional, kami siap membantu kebutuhan produksi tekstil secara cepat, presisi, dan berkualitas tinggi.
                </div>
            </div>
        </div>

        <div class="ov-right-side">

    <div class="ov-slider">

        <div class="ov-slider-track" id="ovSliderTrack">

            @forelse ($services as $service)

            <div class="ov-card">

                <h3 class="ov-card-title">
                    {{ $service->judul }}
                </h3>

                <div class="ov-divider"></div>

                <div class="ov-card-text">
                    {!! $service->isi !!}
                </div>

            </div>

            @empty

            <div class="ov-card">
                Belum ada layanan
            </div>

            @endforelse

        </div>

    </div>

</div>
    <!-- PANAH DI BAWAH -->
    <div class="ov-navigation">

        <button
            type="button"
            class="ov-slider-btn"
            id="ovPrev">
            &#10094;
        </button>

        <button
            type="button"
            class="ov-slider-btn"
            id="ovNext">
            &#10095;
        </button>

    </div>

</div>

</div>
    </section>

    <!-- GRID PRODUCTS ("THE PRODUCTS") -->
    <div id="theproduk" class="ks-full-page-container"> 
        @if($theprodukimage)
            <div class="ks-box-top-left" style="background-image: url('{{ asset($theprodukimage->gambar) }}');"></div>
        @else
            <div class="ks-box-top-left" style="background-color: #222222;"></div>
        @endif

        <div class="ks-box-top-right">
            <div class="ks-products-header">
                <span>the products</span>
                <div class="ks-arrow-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#d80c18" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="7" y1="7" x2="17" y2="17"></line>
                        <polyline points="17 7 17 17 7 17"></polyline>
                    </svg>
                </div>
            </div>
            
            <div class="ks-products-grid">
                @forelse($theproduk as $item)
                    <div class="ks-product-card">
                        <h3>{{ $item->judul }}</h3>
                        <p>{!! $item->isi !!}</p>
                    </div>
                @empty
                    <div class="ks-product-card">
                        <h3>Belum Ada Produk</h3>
                        <p>Silakan tambahkan data melalui halaman admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div> 

    @foreach($produk1    as $item)

<section id="produk{{ $item->urutan }}" class="item-section">

    <div class="item-left">

        <div class="item-badge">
            <div class="item-icon">
                <img src="{{ asset('img/panah ke atas.png') }}" alt="">
            </div>

            <span class="item-badge-text">
                the process
            </span>
        </div>

        <div class="item-content">

            <div class="item-header">

                <span class="item-num">
                    {{ str_pad($item->urutan,2,'0',STR_PAD_LEFT) }}
                </span>

                <h2 class="item-title">
                    {{ $item->judul }}
                </h2>

            </div>

            <p class="item-desc">
                {!! $item->isi !!}
            </p>

        </div>

    </div>

    <div class="item-right">

        <div class="item-frame">

            <img class="item-img"
                 src="{{ asset($item->gambar) }}"
                 alt="{{ $item->judul }}">

        </div>

    </div>

</section>

@endforeach


      <div class="floating-menu" id="floatingMenu">
    <a href="https://wa.me/082133339489"
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

    <!-- FOOTER -->
    <footer class="printex-footer">
        @include('layouts.footer')
    </footer>

    <!-- JAVASCRIPT SLIDER -->
   <script>

const slider = document.querySelector(".ov-slider");
const track = document.querySelector(".ov-slider-track");
const cards = document.querySelectorAll(".ov-card");

const nextBtn = document.getElementById("ovNext");
const prevBtn = document.getElementById("ovPrev");

let current = 0;
const gap = 25;
const visible = 3;

function updateSlider(){

    const cardWidth = cards[0].offsetWidth + gap;

    const maxIndex = Math.max(cards.length - visible,0);

    if(current < 0){
        current = 0;
    }

    if(current > maxIndex){
        current = maxIndex;
    }

    track.style.transform =
        `translateX(-${current * cardWidth}px)`;

}

nextBtn.addEventListener("click",()=>{

    const maxIndex = Math.max(cards.length - visible,0);

    if(current < maxIndex){

        current++;

    }else{

        current = 0;

    }

    updateSlider();

});

prevBtn.addEventListener("click",()=>{

    const maxIndex = Math.max(cards.length - visible,0);

    if(current > 0){

        current--;

    }else{

        current = maxIndex;

    }

    updateSlider();

});

setInterval(()=>{

    const maxIndex = Math.max(cards.length - visible,0);

    if(current < maxIndex){

        current++;

    }else{

        current = 0;

    }

    updateSlider();

},2000);

window.addEventListener("resize",updateSlider);

updateSlider();

</script>
</body>
</html>