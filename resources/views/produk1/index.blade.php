@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Memanggil file CSS dan Icon FontAwesome agar visual tabel admin seragam -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<div class="main-wrapper">
    <div class="container">
        
        <!-- Notifikasi Sukses dengan gaya alert modern -->
        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card">
            
            <!-- Header Section diselaraskan dengan halaman admin lainnya -->
            <div class="header-section" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; gap: 15px; flex-wrap: wrap;">
                <h1 style="margin: 0;">Data Produk 1</h1>
                
                <!-- Tombol Tambah Data -->
                <a href="{{ route('produk1.create') }}" class="btn btn-add">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
            </div>

            <!-- Pembungkus responsif dan tabel admin-table agar layout seragam -->
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th width="120">Gambar</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk1 as $item)
                        <tr>
                            <!-- Kolom No -->
                            <td>{{ $loop->iteration }}</td>
                            
                            <!-- Kolom Gambar dengan preview yang rapi -->
                            <td>
                                <div class="img-preview-box">
                                    @if($item->gambar)
                                        <img src="{{ asset($item->gambar) }}" alt="Gambar Produk 2">
                                    @else
                                        <i class="fa-regular fa-image" style="font-size: 20px; color: #cbd5e1;"></i>
                                    @endif
                                </div>
                            </td>
                            
                            <!-- Kolom Judul -->
                            <td class="text-bold">{{ $item->judul }}</td>
                            
                            <!-- Kolom Isi/Deskripsi -->
                            <td class="text-muted-row">
                                {!! $item->isi !!}
                            </td>
                            
                            <!-- Kolom Aksi -->
                            <td>
                                <div class="aksi">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('produk1.edit', $item->id) }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('produk1.destroy', $item->id) }}" method="POST" style="margin: 0; display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-empty-row">
                                <i class="fa-regular fa-folder-open"></i>
                                Belum ada data produk 2.
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
</div>

@endsection