@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Tambah Product</h3>

    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text"
                   name="judul"
                   class="form-control"
                   value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi"
                      rows="6"
                      class="form-control">{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Urutan</label>
            <input type="number"
                   name="urutan"
                   class="form-control"
                   value="{{ old('urutan',0) }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file"
                   name="gambar"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('products.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection