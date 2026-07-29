<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <!-- Tambahkan CDN FontAwesome untuk ikon tombol -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- jQuery (diperlukan untuk Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#editor').summernote({
        placeholder: 'Masukkan konten...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>
</head>
<body>

<div class="main-wrapper">
    <div class="container" style="max-width: 800px;"> <!-- Membatasi lebar form agar proporsional -->
        <div class="card">

            <!-- Header Section -->
            <div class="header-section" style="margin-bottom: 30px; border-bottom: 1px solid #e2e8f0; padding-bottom: 15px;">
                <h1 style="font-size: 24px;">
                    <i class="fa-solid fa-square-plus" style="color: #566270; margin-right: 8px;"></i>Tambah Lokasi
                </h1>
            </div>

            <!-- Pesan Error Validasi -->
            @if ($errors->any())
                <div class="alert-danger" style="background:#fef2f2; color:#991b1b; border: 1px solid #fca5a5; padding:14px 18px; border-radius:12px; margin-bottom:20px; font-size: 14px;">
                    <ul style="margin-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('location.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_kota">Nama Kota</label>
                    <input 
                        type="text" 
                        id="nama_kota"
                        name="nama_kota" 
                        value="{{ old('nama_kota') }}"
                        placeholder="Masukkan nama kota" 
                        required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="editor" name="alamat" rows="5">
        {{ old('alamat', $locations->alamat ?? '') }}
    </textarea>
                </div>

                <!-- Bagian Tombol Aksi Bawah -->
                <div class="btn-group" style="display: flex; justify-content: space-between; gap: 15px; margin-top: 35px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                    <a href="{{ route('location.index') }}" class="btn btn-back" style="background: #64748b; color: #fff;">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-save" style="background: #10b981; color: #fff;">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- Footer Konsisten -->
    <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Dokumentasi</a>
            <a href="#">Bantuan</a>
            <a href="#">Cantast hara</a>
        </div>
        <div class="footer-copyright">
            &copy; 2026 Admin. Intex
        </div>
    </footer>
</div>

</body>
</html>
@endsection