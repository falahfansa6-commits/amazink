<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>footer</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <footer class="printex-footer">

    <div class="printex-container">

        {{-- KOLOM 1 --}}
        <div>

            <div class="printex-logo-text">
                <img src="{{ asset('img/printexlogo.png') }}" alt="Printex">
            </div>

            <p class="printex-desc11">
                Solusi cetak tekstil digital masa depan untuk kebutuhan fashion,
                konveksi, dan bisnis modern.
            </p>

        </div>

        {{-- KOLOM 2 --}}
        <div>

            <h2 class="printex-title">
                Perusahaan
            </h2>

            <ul class="printex-links">

                <li>
                    <a href="{{ route('about') }}">
                        Tentang Kami
                    </a>
                </li>

                <li>
                    <a href="{{ route('pelayanan') }}">
                        Layanan
                    </a>
                </li>

                <li>
                    <a href="{{ route('kontak') }}">
                        Kontak
                    </a>
                </li>

            </ul>

        </div>

        {{-- KOLOM 3 --}}
        <div>

            <h2 class="printex-title">
                Kontak
            </h2>

            <div class="printex-contact">

                <div class="printex-contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Tangerang, Indonesia</span>
                </div>

                <div class="printex-contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>+62 851-9609-3295</span>
                </div>

                <div class="printex-contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>info@printex.co.id</span>
                </div>

                <div class="printex-contact-item">
                    <i class="fa-solid fa-clock"></i>
                    <span>
                        Senin - Jumat, 08.00 - 17.00 WIB <br>
                        Sabtu, 08.00 - 14.00 WIB
                    </span>
                </div>

            </div>

        </div>

        {{-- KOLOM 4 --}}
        <div class="printex-newsletter">

            <h2 class="printex-title">
                Newsletter
            </h2>

            <p>
                Dapatkan update informasi produk dan promo terbaru dari kami.
            </p>

               <div class="printex-social">

            <a href="https://wa.me/6285196093295"
               target="_blank"
               class="social-item">
                <img src="{{ asset('img/logo-wa.png') }}" alt="WhatsApp">
            </a>

            <a href="https://www.instagram.com/printex.official"
               target="_blank"
               class="social-item">
                <img src="{{ asset('img/logo-ig.png') }}" alt="Instagram">
            </a>

        </div>

        </div>

    </div>

    {{-- BOTTOM --}}
    <div class="printex-bottom">

        <div class="printex-copy">
            © {{ date('Y') }} Printex — All Rights Reserved.
        </div>

      

    </div>

</footer>

</body>
</html>