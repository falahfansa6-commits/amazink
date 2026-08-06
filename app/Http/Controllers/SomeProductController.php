<?php

namespace App\Http\Controllers;

use App\Models\SomeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SomeProductController extends Controller
{
    public function index()
    {
        $someProducts = SomeProduct::orderBy('urutan', 'asc')->get();

        return view('someproduk.index', compact('someProducts'));
    }


    public function create()
    {
        return view('someproduk.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'isi'    => 'required',
            'urutan' => 'required|integer',
            'gambar' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);


        
        $file = $request->file('gambar');
        $namaGambar = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/some'),
            $namaGambar
        );


        SomeProduct::create([
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'urutan' => $request->urutan,
            'gambar' => $namaGambar,
        ]);


        return redirect()
            ->route('someproduct.index')
            ->with('success','Data berhasil disimpan');
    }


    public function show(SomeProduct $someProduct)
    {
        return view('someproduk.show', compact('someProduct'));
    }


    public function edit(SomeProduct $someProduct)
    {
        return view('someproduk.edit', compact('someProduct'));
    }


    public function update(Request $request, SomeProduct $someProduct)
    {
        $request->validate([
            'judul'  => 'required',
            'isi'    => 'required',
            'urutan' => 'required|integer',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);


        $data = [
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'urutan' => $request->urutan,
        ];


        
        if ($request->hasFile('gambar')) {


            
            $gambarLama = public_path(
                'uploads/some/'.$someProduct->gambar
            );


            if (File::exists($gambarLama)) {
                File::delete($gambarLama);
            }


            $file = $request->file('gambar');

            $namaGambar = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/some'),
                $namaGambar
            );


            $data['gambar'] = $namaGambar;
        }


        $someProduct->update($data);


        return redirect()
            ->route('someproduct.index')
            ->with('success','Data berhasil diupdate');
    }


    public function destroy(SomeProduct $someProduct)
    {

   
        $gambar = public_path(
            'uploads/some/'.$someProduct->gambar
        );


        if(File::exists($gambar)){
            File::delete($gambar);
        }


        $someProduct->delete();


        return redirect()
            ->route('someproduct.index')
            ->with('success','Data berhasil dihapus');
    }
}
