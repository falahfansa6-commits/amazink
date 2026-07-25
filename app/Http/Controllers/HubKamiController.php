<?php

namespace App\Http\Controllers;

use App\Models\Hub_kami;
use Illuminate\Http\Request;

class HubKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hub_kami = Hub_kami::all();

        return view('hub.index', compact('hub_kami'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontak');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|min:7',
            'no_wa' => 'required',
            'isi'   => 'required',
            'email' => [
                'required',
                'email',
                'regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/'
            ],
        ], [
            'email.regex' => 'Email harus menggunakan @gmail.com',
        ]);

        Hub_kami::create([
            'nama'  => $request->nama,
            'no_wa' => $request->no_wa,
            'isi'   => $request->isi,
            'email' => $request->email,
        ]);

        return redirect()->route('kontak')
            ->with('success', 'Berhasil Mengirim Pesan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hub_kami $hub_kami)
    {
        return view('hub.show', compact('hub_kami'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hub_kami $hub_kami)
    {
        return view('hub.edit', compact('hub_kami'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hub_kami $hub_kami)
    {
        $request->validate([
            'nama'  => 'required|min:7',
            'no_wa' => 'required',
            'isi'   => 'required',
            'email' => [
                'required',
                'email',
                'regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/'
            ],
        ], [
            'email.regex' => 'Email harus menggunakan @gmail.com',
        ]);

        $hub_kami->update([
            'nama'  => $request->nama,
            'no_wa' => $request->no_wa,
            'isi'   => $request->isi,
            'email' => $request->email,
        ]);

        return redirect()->route('hub.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hub_kami $hub_kami)
    {
        $hub_kami->delete();

        return redirect()->route('hub_kami.index')
            ->with('success', 'Data berhasil dihapus');
    }
}