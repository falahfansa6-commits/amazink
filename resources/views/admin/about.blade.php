@extends('layouts.admin')

@section('title', 'About')

@section('content')

<!-- Memanggil file CSS agar gaya visual aktif di halaman ini -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<div class="main-wrapper">
    <div class="container">
        <div class="card">

            <div class="header-section">
                <h2>Dashboard Admin</h2>
            </div>

            <p style="margin-bottom: 25px; color: #475569; font-size: 14px;">
                Selamat datang di Dashboard Admin <b>Printex</b>. Silakan pilih menu yang ingin dikelola.
            </p>

           
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
                           
                            <td class="judul-text">Tentang Printex</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('tentang.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="judul-text">Lokasi Printex</td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('location.index') }}" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection