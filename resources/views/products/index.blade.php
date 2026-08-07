@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Edit Product</h3>

    <form action="{{ route('products.update',$product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text"
                   name="judul"
                   class="form-control"
                   value="{{ old('judul',$product->judul) }}">
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi"
                      rows="6"
                      class="form-control">{{ old('isi',$product->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Urutan</label>
            <input type="number"
                   name="urutan"
                   class="form-control"
                   value="{{ old('urutan',$product->urutan) }}">
        </div>

        <div class="mb-3">

            @if($product->gambar)
                <img src="{{ asset('storage/'.$product->gambar) }}"
                     width="150"
                     class="img-thumbnail mb-2">
            @endif

            <label>Ganti Gambar</label>

            <input type="file"
                   name="gambar"
                   class="form-control">

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('products.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection