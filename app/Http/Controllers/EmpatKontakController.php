<?php

namespace App\Http\Controllers;

use App\Models\EmpatKontak;
use Illuminate\Http\Request;

class EmpatKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empatkontaks = EmpatKontak::orderBy('urutan')->get();
        return view('admin.empatkontak.index', compact('empatkontaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.empatkontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
 'judul' => 'required',
 'isi' => 'required',
 'link' => 'required',
 'urutan' => 'required|integer'
        ]);
        EmpatKontak::create([
     'judul' => $request->judul,
     'isi' => $request->isi,
     'link' => $request->link,
     'urutan' => $request->urutan
        ]);

        EmpatKontak::create($request->all());
        return redirect()->route('empat-kontak.index')
        ->with('success', 'Data berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(EmpatKontak $empatKontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmpatKontak $empatKontak)
    {
        return view('admin.empatkontak.edit', compact('empatKontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmpatKontak $empatKontak)
    {
        $request->validate([
           'judul' => 'required',
           'isi' => 'required',
           'link' => 'required',
           'urutan' => 'required|integer'
        ]);
        $empatKontak->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmpatKontak $empatKontak)
    {
        $empatKontak->delete();
        return redirect()->route('empat-kontak.index')
        ->with('success', 'Data Berhasil Di simpan');
    }
}
