<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINTEX | Beranda</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        @include('layouts.navbar')
    </nav>

    <!-- SLIDER -->
    <section class="slider-container" id="slider">
        <button class="prev" onclick="prevSlide()">❮</button>

        <div class="slider" id="slider">
            @forelse($sliderBeranda as $slider)
                <div class="slide">
                    <img src="{{ asset('uploads/slider/'.$slider->gambar) }}" alt="{{ $slider->judul }}">
                </div>
            @empty
                <div class="slide">
                    <h3>Tidak ada slider</h3>
                </div>
            @endforelse
        </div>

        <button class="next" onclick="nextSlide()">❯</button>
    </section>

   @if(empty($keyword))
<section class="container">
    <div class="text">
        <img src="{{ asset('img/p.png') }}" alt="Logo P" height="100" width="100">
        <h1>Tentang<br>Kami</h1>
        <p>
            Printex merupakan perusahaan yang bergerak di bidang jasa
            printing textile, sablon digital, dan kaos premium.
            Kami menyediakan solusi cetak kain berkualitas tinggi
            untuk kebutuhan industri fashion, konveksi,
            hingga usaha kecil dan menengah.
        </p>
    </div>

    <div class="gambar">
        <img src="{{ asset('img/orang.png') }}" alt="Tentang Kami Printex">
    </div>
</section>
@endif

<!-- HASIL SABLON / SECOUNDS -->
@if($secounds)

<section class="secounds-section" id="secound">

    @if($secounds->gambar)
        <img src="{{ asset('uploads/secound/' . $secounds->gambar) }}"
             alt="{{ $secounds->judul }}"
             style="width: 100%; height: 400px; object-fit: cover;">
    @endif

    <div class="pts-section-container">

        <div class="pts-left-title">
            <h2 class="pts-main-heading">
                {{ $secounds->judul }}
            </h2>
        </div>

        <div class="pts-right-description">
            {!! $secounds->isi !!}
        </div>

    </div>

</section>

@endif


  <!-- OUR VALUES -->
@if($ourvalues->count())

<section class="ov-section-wrapper" id="ourvalue">

    <!-- Bagian kiri -->
    <div class="ov-left-side">

        <div class="ov-image-container">
            @if($gambar)
                <img class="ov-profile-img"
                     src="{{ asset($gambar->gambar) }}"
                     alt="Our Values">
            @endif
        </div>

        <div class="ov-title-container">
            <h2 class="ov-main-title">Our Values</h2>

            <div class="ov-arrow-button">
                ➔
            </div>
        </div>

    </div>

    <!-- Bagian kanan -->
    <div class="ov-right-side">

        @foreach($ourvalues as $item)

            <div class="ov-card {{ $loop->last ? 'ov-card-fullwidth' : '' }}">

                <h3 class="ov-card-title">
                    {{ $item->judul }}
                </h3>
                   <p class="ov-card-text">
                    {!! $item->isi !!}
                </p>

            </div>

            @if($loop->iteration == 2 || $loop->iteration == 4)
                <hr class="ov-divider">
            @endif

        @endforeach

    </div>

</section>

@endif
    <!-- FOOTER -->
     <footer class="printex-footer">
        @include('layouts.footer')
    </footer> 

    <!-- JAVASCRIPT SLIDER -->
    <script>
        let slider = document.getElementById('slider');
        let slides = document.querySelectorAll('.slide');
        let index = 0;

        function nextSlide() {
            if (slides.length <= 1) return;
            index = (index + 1) % slides.length;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }

        function prevSlide() {
            if (slides.length <= 1) return;
            index = (index - 1 + slides.length) % slides.length;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }

        if (slides.length > 1) {
            setInterval(nextSlide, 4000);
        }
    </script>
</body>
</html>