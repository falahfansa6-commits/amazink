@extends('layouts.app')

@section('content')

<div class="container">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Edit Product</h3>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('products.update', $product->id) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    {{-- Judul --}}
    <div class="mb-3">
        <label for="judul" class="form-label">
            Judul
        </label>

        <input
            type="text"
            id="judul"
            name="judul"
            class="form-control"
            value="{{ old('judul', $product->judul) }}"
            required
        >
    </div>

    {{-- Isi --}}
    <div class="mb-3">
        <label for="isi" class="form-label">
            Isi
        </label>

        <textarea
            id="isi"
            name="isi"
            class="form-control"
            rows="6"
            required
        >{{ old('isi', $product->isi) }}</textarea>
    </div>

    {{-- Urutan --}}
    <div class="mb-3">
        <label for="urutan" class="form-label">
            Urutan
        </label>

        <input
            type="number"
            id="urutan"
            name="urutan"
            class="form-control"
            value="{{ old('urutan', $product->urutan) }}"
            required
        >
    </div>

    {{-- Gambar --}}
    <div class="mb-3">

        <label for="gambar" class="form-label">
            Gambar
        </label>

        @if($product->gambar)

            <div class="mb-3">
                <img
                    src="{{ asset('storage/' . $product->gambar) }}"
                    width="200"
                    class="img-thumbnail"
                    alt="{{ $product->judul }}"
                >
            </div>

        @endif

        <input
            type="file"
            id="gambar"
            name="gambar"
            class="form-control"
            accept="image/jpeg,image/png,image/webp"
        >

        <small class="text-muted">
            Kosongkan jika tidak ingin mengganti gambar.
        </small>

    </div>

    {{-- Tombol --}}
    <div class="mt-4">

        <button
            type="submit"
            class="btn btn-primary"
        >
            Update Product
        </button>

        <a
            href="{{ route('products.index') }}"
            class="btn btn-secondary"
        >
            Batal
        </a>

    </div>

</form>
</div>

@endsection
