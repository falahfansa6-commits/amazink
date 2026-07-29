@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Memanggil file CSS dan Icon FontAwesome agar gaya visual sama persis dengan halaman About -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<!-- Menggunakan wrapper utama yang sama seperti halaman About agar layout konsisten -->
<div class="main-wrapper">
    <div class="container">
        <div class="card">

            <div class="header-section">
                <h2>Dashboard Admin</h2>
            </div>

            <p style="margin-bottom: 25px; color: #475569; font-size: 14px;">
                Selamat datang di Dashboard Admin <b>Printex</b>. Silakan pilih menu yang ingin dikelola.
            </p>

            <!-- Menggunakan pembungkus responsif dan kelas tabel admin-table agar sama dengan About -->
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                           
                        </tr>
                        <tr>
                            <td class="judul-text">Produk layanan</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('service.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="judul-text">Gambar</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('theprodukimage.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="judul-text">Produk</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('theproduk.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>

                          <tr>
                            <td class="judul-text">Produk 1</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('produk1.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>



                          <tr>
                            <td class="judul-text">Produk 2</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('produk2.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>


                              <tr>
                            <td class="judul-text">Produk 3</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('produk3.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection