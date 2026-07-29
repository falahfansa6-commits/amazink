<?php

namespace App\Http\Controllers;

use App\Models\Secound;
use Illuminate\Http\Request;

class SecoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

 $query = $request->input('k');

if ($query) {
    $secounds = Secound::when($query, function ($queryBuilder) use ($query) {
        $queryBuilder->where(function ($k) use ($query) {
            $k->where('judul', 'like', '%' . $query . '%')
              ->orWhere('isi', 'like', '%' . $query . '%');
        });
    })->paginate(5);
} else {
    $secounds = Secound::latest()->paginate(5);
}
       
        return view('secound.index', compact('secounds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secound.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|max:255',
            'isi'    => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/secound'), $namaGambar);
        }

        Secound::create([
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('secound.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secound $secound)
    {
        return view('secound.show', compact('secound'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secound $secound)
    {
        return view('secound.edit', compact('secound'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secound $secound)
    {
        $request->validate([
            'judul'  => 'required|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($secound->gambar && file_exists(public_path('uploads/secound/' . $secound->gambar))) {
                unlink(public_path('uploads/secound/' . $secound->gambar));
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/secound'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        $secound->update($data);

        return redirect()
            ->route('secound.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secound $secound)
    {
        // Hapus gambar
        if ($secound->gambar && file_exists(public_path('uploads/secound/' . $secound->gambar))) {
            unlink(public_path('uploads/secound/' . $secound->gambar));
        }

        $secound->delete();

        return redirect()
            ->route('secound.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}