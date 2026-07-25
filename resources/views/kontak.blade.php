
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PRINTEX</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

  

    <nav >
        @include('layouts.navbar')
    </nav>

    <section id="hubkami">
    <div class="hk-section-wrapper">
        <div class="hk-badge">Kontak Kami</div>
        <h2 class="hk-main-title">Hubungi <span class="hk-title-underline">Kami</span></h2>
        
        <div class="hk-form-card">
           @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('hub_kami.store') }}" method="POST">
    @csrf

    <div class="hk-input-group">
        <label class="hk-label">
            Nama <span class="hk-required">*</span>
        </label>

        <input
            type="text"
            name="nama"
            class="hk-input-field"
            placeholder="Nama kamu"
            value="{{ old('nama') }}"
            required>

        @error('nama')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <div class="hk-input-group">
        <label class="hk-label">
            No. WA <span class="hk-required">*</span>
        </label>

        <input
            type="text"
            name="no_wa"
            class="hk-input-field"
            placeholder="08xxxxxxxxxx"
            value="{{ old('no_wa') }}"
            required>

        @error('no_wa')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <div class="hk-input-group">
        <label class="hk-label">
            Email <span class="hk-required">*</span>
        </label>

        <input
            type="email"
            name="email"
            class="hk-input-field"
            placeholder="contoh@gmail.com"
            value="{{ old('email') }}"
            required>

        @error('email')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <div class="hk-input-group">
        <label class="hk-label">
            Ceritakan Kebutuhanmu
            <span class="hk-optional">(Opsional)</span>
        </label>

        <textarea
            name="isi"
            class="hk-textarea-field"
            rows="5"
            placeholder="Tulis kebutuhan Anda...">{{ old('isi') }}</textarea>

        @error('isi')
            <small style="color:red">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="hk-btn-submit">
        Kirim Pesan
    </button>
</form>
        </div>
    </div>
    </section>

    <section id="empatkontak">

   <div class="ic-cards-section-wrapper">
    <div class="ic-cards-grid">

     @php
    $email = $empatkontaks->where('urutan', 1)->first();
    $kantor = $empatkontaks->where('urutan', 2)->first();
    $telepon = $empatkontaks->where('urutan', 3)->first();
    $whatsapp = $empatkontaks->where('urutan', 4)->first();
@endphp

<!-- Email -->
<div class="ic-contact-card">
    <div>
        <div class="ic-card-icon-box">✉</div>
        <div class="ic-card-label">{{ $email->judul ?? 'Email' }}</div>

        <h3 class="ic-card-main-info">
            {!! $email->isi !!}
        </h3>

        <p class="ic-card-sub-desc">
            Kami akan merespons secepat mungkin.
        </p>
    </div>

    <a href="{{ $email->link ?? '#' }}" class="ic-card-action-link">
        Kirim Email ↗
    </a>
</div>

<!-- Kantor -->
<div class="ic-contact-card">
    <div>
        <div class="ic-card-icon-box">📍</div>
        <div class="ic-card-label">{{ $kantor->judul ?? 'Kantor' }}</div>

        <h3 class="ic-card-main-info">
            {!! $kantor->isi !!}
        </h3>

        <p class="ic-card-sub-desc">
            Mari ngobrol langsung dan temukan solusi sablon terbaik.
        </p>
    </div>

    <a href="{{ $kantor->link ?? '#' }}" target="_blank" class="ic-card-action-link ic-link-green">
        Buka Maps ↗
    </a>
</div>

<!-- Telepon -->
<div class="ic-contact-card">
    <div>
        <div class="ic-card-icon-box">📞</div>
        <div class="ic-card-label">{{ $telepon->judul ?? 'Telepon' }}</div>

        <h3 class="ic-card-main-info">
           {!! $telepon->isi !!}
        </h3>

        <p class="ic-card-sub-desc">
            Tersedia Senin–Jumat, pukul 08:00 – 17:00 WIB. <br>
            Sabtu, pukul 08:00 – 14:00 WIB
        </p>
    </div>

    <a href="{{ $telepon->link ?? '#' }}" class="ic-card-action-link">
        Hubungi Sekarang ↗
    </a>
</div>

<!-- WhatsApp -->
<div class="ic-contact-card ic-featured-green">
    <div>
        <div class="ic-card-icon-box">💬</div>
        <div class="ic-card-label">{{ $whatsapp->judul ?? 'WhatsApp Chat' }}</div>

        <h3 class="ic-card-main-info">
            {{ $whatsapp->isi ?? '' }}
        </h3>

        <p class="ic-card-sub-desc">
            Butuh bantuan cepat? Tim support kami siap di sini.
        </p>
    </div>

    <a href="{{ $whatsapp->link ?? '#' }}" target="_blank" class="ic-card-action-link">
        Mulai Chat ↗
    </a>
</div>

    </div>

    <div class="ic-operational-bar">

        <div class="ic-op-left-info">
            <span class="ic-op-icon">🕒</span>
            <div>
                <h4 class="ic-op-title">Jam Operasional</h4>
                <p class="ic-op-hours">
                    Senin - Jumat 08:00 - 17:00 WIB <br>
                    Sabtu 08:00 - 14:00 WIB
                </p>
            </div>
        </div>

        <div class="ic-op-right-nav">
            <a href="{{ $email->link ?? '#' }}" class="ic-op-nav-item">Email</a>
            <a href="{{ $whatsapp->link ?? '#' }}" class="ic-op-nav-item">WhatsApp</a>
            <a href="{{ $telepon->link ?? '#' }}" class="ic-op-nav-item">Telepon</a>
        </div>


    </div>

</div>
</section>
<footer class="printex-footer">
@include('layouts.footer')

</footer>

</body>
</html>