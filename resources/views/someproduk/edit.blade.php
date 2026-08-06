@extends('layouts.admin')

@section('content')

<div class="container">

    <h2>Edit Some Product</h2>

    <form action="{{ route('someproduct.update', $someProduct) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Judul</label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ old('judul',$someProduct->judul) }}">

        </div>

        <div class="mb-3">

            <label>Isi</label>

            <textarea
                name="isi"
                rows="5"
                class="form-control">{{ old('isi',$someProduct->isi) }}</textarea>

        </div>

        <div class="mb-3">

            <label>Urutan</label>

            <input
                type="number"
                name="urutan"
                class="form-control"
                value="{{ old('urutan',$someProduct->urutan) }}">

        </div>

        <div class="mb-3">

            <label>Gambar Saat Ini</label>

            <br>

            <img
                src="{{ asset('uploads/some/'.$someProduct->gambar) }}"
                width="180">

        </div>

        <div class="mb-3">

            <label>Ganti Gambar</label>

            <input
                type="file"
                name="gambar"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('someproduct.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection