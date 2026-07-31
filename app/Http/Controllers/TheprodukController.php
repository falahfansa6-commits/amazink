<?php

namespace App\Http\Controllers;

use App\Models\Theproduk;
use Illuminate\Http\Request;

class TheprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theproduk = Theproduk::orderBy('urutan', 'ASC')->get();

        return view('theproduk.index', compact('theproduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('theproduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required| max:40',
            'isi' => 'required',
            'urutan' => 'required|integer'
        ]);

        Theproduk::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'urutan' => $request->urutan
        ]);

        return redirect()->route('theproduk.index')
        ->with('success', 'berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theproduk $theproduk)
    {
        return view('theproduk.show', compact('theproduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theproduk $theproduk)
    {
        return view('theproduk.edit', compact('theproduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theproduk $theproduk)
    {
        $request->validate([
            'judul' => 'required|max:40',
            'isi' => 'required',
            'urutan' => 'required|integer'
        ]);

        $theproduk->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'urutan' => $request->urutan
        ]);


        return redirect()->route('theproduk.index')
        ->with('success', 'Berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theproduk $theproduk)
    {
        $theproduk->delete();
        return redirect()->route('theproduk.index')->with('success', 'Berhasil di hapus');
    }
}
