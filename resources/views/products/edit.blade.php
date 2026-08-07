@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Product</h3>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            Tambah Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th width="70">No</th>
                <th width="80">Urutan</th>
                <th width="120">Gambar</th>
                <th>Judul</th>
                <th>Isi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->urutan }}</td>

                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}"
                                 width="100"
                                 class="img-thumbnail">
                        @endif
                    </td>

                    <td>{{ $item->judul }}</td>

                    <td>{{ Str::limit(strip_tags($item->isi),60) }}</td>

                    <td>
                        <a href="{{ route('products.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>

                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada data.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>
@endsection