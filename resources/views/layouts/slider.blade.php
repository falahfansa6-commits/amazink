 <!-- SLIDER -->
    <section class="slider-container">
        <button class="prev" onclick="prevSlide()">❮</button>

        <div class="slider" id="slider">
            @forelse($sliderPelayanan as $slider)
                <div class="slide">
                    <img src="{{ asset('uploads/slider/'.$slider->gambar) }}" alt="{{ $slider->judul }}">
                </div>
            @empty
                <div class="slide empty-slide">
                    <h3>Tidak ada slider</h3>
                </div>
            @endforelse
        </div>

        <button class="next" onclick="nextSlide()">❯</button>
    </section>