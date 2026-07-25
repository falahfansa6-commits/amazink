@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Memanggil asset CSS utama -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<div class="main-wrapper">
    <div class="container">
        
        <!-- Alert dari session success -->
        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card">
            
            <!-- Header Section -->
            <div class="header-section">
                <h1>Data Produk 3</h1>
                <a href="{{ route('produk3.create') }}" class="btn btn-add">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
            </div>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th width="180">Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk3 as $item)
                        <tr>
                            <!-- Kolom Nomor Urut Bergaya Badge kotak kecil -->
                            <td>
                                <span class="order-number">{{ $loop->iteration }}</span>
                            </td>

                              <td>
                                @if($item->gambar)
                                    <div class="image-wrapper">
                                        <img src="{{ asset('upload/produk3/'.$item->gambar) }}" alt="{{ $item->judul }}" class="preview">
                                        <a href="{{ route('produk3.edit', $item->id) }}" class="quick-edit-overlay">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span>Ubah</span>
                                        </a>
                                    </div>
                                @else
                                    <div class="no-image">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            
                            <!-- Kolom Judul (Teks Tebal Otomatis) -->
                            <td class="judul-text">{{ $item->judul }}</td>
                            
                            <!-- Kolom Deskripsi dengan pembatasan teks agar rapi -->
                            <td class="text-muted-row">
                               {!! $item->isi !!}
                            </td>
                            
                            <!-- Kolom Gambar memanfaatkan fitur Hover Overlay dari CSS -->
                           
                            
                            <!-- Kolom Aksi Tombol -->
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('produk3.edit', $item->id) }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>

                                    <form action="{{ route('produk3.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-data">
                                <i class="fa-regular fa-folder-open" style="font-size: 24px; display: block; margin-bottom: 8px;"></i>
                                Data produk belum tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
  <br>
  <a href="{{ route('admin.layanan') }}" class="btn btn-back" style="background: #64748b; color: #fff;">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
        </div>
    </div>
    
    <!-- Footer Terintegrasi bawaan CSS -->
    <footer class="main-footer"
   
        <span class="footer-copyright">&copy; {{ date('Y') }} Admin Dashboard. All rights reserved.</span>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
    </footer>
</div>

@endsection