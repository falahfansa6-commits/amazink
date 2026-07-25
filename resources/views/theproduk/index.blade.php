@extends('layouts.admin')

@section('title', 'Layanan')

@section('content')

<!-- Memanggil file CSS dan Icon FontAwesome agar visual dan gaya tabel admin seragam -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<div class="main-wrapper">
    <div class="container">

        <!-- Notifikasi Sukses dengan gaya alert modern global -->
        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card">

            <!-- Header Section diselaraskan dengan halaman admin lainnya -->
            <div class="header-section" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; gap: 15px; flex-wrap: wrap;">
                <div>
                    <h2 style="margin: 0;">Daftar The Products</h2>
                    <p style="margin: 5px 0 0 0; color: #64748b; font-size: 14px;">Kelola data The Products.</p>
                </div>
                
                <!-- Tombol Tambah Data -->
                <a href="{{ route('theproduk.create') }}" class="btn btn-add" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
            </div>

            <!-- Pembungkus responsif dan tabel admin-table agar layout seragam -->
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th width="120" style="text-align: center;">Urutan</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($theproduk as $item)
                        <tr>
                            <!-- Kolom No -->
                            <td>{{ $loop->iteration }}</td>

                            <!-- Kolom Judul -->
                            <td class="text-bold">
                                {{ $item->judul }}
                            </td>

                            <!-- Kolom Isi/Deskripsi -->
                            <td class="text-muted-row">
                                {!! $item->isi !!}
                                
                            </td>

                            <!-- Kolom Urutan -->
                            <td style="text-align: center;">
                                <span class="text-bold" style="background-color: #f1f5f9; padding: 4px 10px; border-radius: 20px; font-size: 13px; border: 1px solid #e2e8f0; display: inline-block;">
                                    {{ $item->urutan }}
                                </span>
                            </td>

                            <!-- Kolom Aksi -->
                            <td>
                                <div class="aksi">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('theproduk.edit', $item->id) }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('theproduk.destroy', $item->id) }}" method="POST" style="margin: 0; display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
                                Belum ada data produk.
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