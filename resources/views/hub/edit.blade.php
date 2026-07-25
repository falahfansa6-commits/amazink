@extends('layouts.admin')

@section('title', 'Hubungi Kami')

@section('content')

<!-- Menggunakan berkas CSS slider dan ikon FontAwesome agar visual form seragam -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<div class="main-wrapper">
    <!-- Batas max-width kecil agar ukuran form teratur dan proporsional -->
    <div class="container" style="max-width: 600px;">
        
        <div class="card">
            
            <!-- Bagian Header Form -->
            <div class="header-section" style="border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 20px;">
                <h1>Edit Pesan Hubungi Kami</h1>
            </div>

            <!-- Blok Pesan Error Validasi Global -->
            @if ($errors->any())
                <div class="alert-danger" style="margin-bottom: 20px;">
                    <p style="margin: 0; font-weight: bold;">
                        <i class="fa-solid fa-triangle-exclamation"></i> Harap perbaiki kesalahan pengisian form di bawah ini.
                    </p>
                    <ul style="margin: 10px 0 0 0; padding-left: 20px; font-size: 13px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Data -->
            <form action="{{ route('hub_kami.update', $hub_kami->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Nama -->
                <div class="form-group">
                    <label for="nama">Nama <span style="color: #ef4444;">*</span></label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        value="{{ old('nama', $hub_kami->nama) }}" 
                        placeholder="Masukkan nama"
                        class="@error('nama') is-invalid @enderror"
                        required>
                    @error('nama')
                        <small style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Input No WhatsApp -->
                <div class="form-group" style="margin-top: 15px;">
                    <label for="no_wa">No WhatsApp <span style="color: #ef4444;">*</span></label>
                    <input 
                        type="text" 
                        id="no_wa" 
                        name="no_wa" 
                        value="{{ old('no_wa', $hub_kami->no_wa) }}" 
                        placeholder="Contoh: 081234567890"
                        class="@error('no_wa') is-invalid @enderror"
                        required>
                    @error('no_wa')
                        <small style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </small>
                    @enderror
                </div>

                {{-- <!-- Input Email -->
                <div class="form-group" style="margin-top: 15px;">
                    <label for="email">Email <span style="color: #ef4444;">*</span></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $hub_kami->email) }}" 
                        placeholder="Masukkan alamat email"
                        class="@error('email') is-invalid @enderror"
                        required>
                    @error('email')
                        <small style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </small>
                    @enderror
                </div> --}}



                 <!-- Input No WhatsApp -->
                <div class="form-group" style="margin-top: 15px;">
                    <label for="email">Email <span style="color: #ef4444;">*</span></label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $hub_kami->email) }}" 
                        placeholder="Contoh@gmail.com"
                        class="@error('email') is-invalid @enderror"
                        required>
                    @error('no_wa')
                        <small style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </small>
                    @enderror
                </div>
                <!-- Input Pesan -->
                <div class="form-group" style="margin-top: 15px;">
                    <label for="isi">Pesan <span style="color: #ef4444;">*</span></label>
                    <textarea 
                        id="isi" 
                        name="isi" 
                        rows="6" 
                        placeholder="Masukkan pesan atau isi deskripsi"
                        class="@error('isi') is-invalid @enderror"
                        required>{{ old('isi', $hub_kami->isi) }}</textarea>
                    @error('isi')
                        <small style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Kelompok Tombol Aksi menggunakan wrapper .aksi bawaan dari slider.css -->
                <div class="aksi" style="justify-content: flex-start; margin-top: 25px; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                    <button type="submit" class="btn btn-add" style="background: #10b981;">
                        <i class="fa-solid fa-floppy-disk"></i> Update
                    </button>
                    <a href="{{ route('hub_kami.index') }}" class="btn btn-edit" style="background: #64748b; color: white;">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection