<script>
document.addEventListener("DOMContentLoaded", function () {

    if (window.location.hash) {

        const target = document.querySelector(window.location.hash);

        if (target) {

            target.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });

            target.classList.add("search-highlight");

            setTimeout(() => {
                target.classList.remove("search-highlight");
            }, 3000);
        }

    }

});
</script>
<nav class="navbar">
        
        <a href="#" class="logo-container">
            <img src="{{ asset('img/printex-merah.png') }}" alt="Logo" class="logo-img">
        </a>
       <div class="search-container">
   <form action="{{ route('search') }}" method="GET" >

    <input
    class="search-input"
        type="text"
        name="k"
        placeholder="Cari..."
        value="{{ request('k') }}">

        @if(session('error'))
    <div class="search-error">
        {{ session('error') }}
    </div>
@endif
        

</form>
</div>

        <div class="menu-container">
            <a href="{{ route('beranda') }}" class="menu-item">Beranda</a>
            <a href="{{ route('about') }}" class="menu-item">Tentang</a>
            <a href="{{ route('pelayanan') }}" class="menu-item">Layanan</a>
            <a href="{{ route('kontak') }}" class="menu-item">Kontak</a>
            
            <button
    class="btn-utama"
    onclick="window.location.href='{{ route('login') }}'">
    Masuk atau Login
</button>
        </div>
    </nav>