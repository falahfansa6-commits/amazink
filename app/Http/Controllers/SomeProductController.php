<?php

namespace App\Http\Controllers;

use App\Models\SomeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SomeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $some = SomeProduct::orderBy('urutan')->get();

        return view('someproduk.index', compact('some'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('someproduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required',
            'isi'     => 'required',
            'urutan'  => 'required|integer',
            'gambar'  => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $namafile = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/some'), $namafile);
        }

        SomeProduct::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'urutan'  => $request->urutan,
            'gambar'  => $namafile,
        ]);

        return redirect()->route('someproduct.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SomeProduct $someProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SomeProduct $someProduct)
    {
        return view('someproduk.edit', compact('someProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SomeProduct $someProduct)
    {
        $request->validate([
            'judul'   => 'required',
            'isi'     => 'required',
            'urutan'  => 'required|integer',
            'gambar'  => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $data = [
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'urutan'  => $request->urutan,
        ];

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            $path = public_path('uploads/some/' . $someProduct->gambar);

            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/some'), $namafile);

            $data['gambar'] = $namafile;
        }

        $someProduct->update($data);

        return redirect()->route('someproduct.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SomeProduct $someProduct)
    {
        $path = public_path('uploads/some/' . $someProduct->gambar);

        if (File::exists($path)) {
            File::delete($path);
        }

        $someProduct->delete();

        return redirect()->route('someproduct.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}