<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('posisi')
                        ->orderBy('urutan')
                        ->get();

        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'posisi' => 'required'
        ]);

        $file = $request->file('gambar');
        $namafile = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads/slider'), $namafile);

        Slider::create([
            'judul'  => $request->input('judul'),
            'gambar' => $namafile,
            'posisi' => $request->input('posisi'),
            'status' => $request->input('status', 1),
            'urutan' => $request->input('urutan', 1),
        ]);

        return redirect()
            ->route('slider.index')
            ->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        // Perbaikan: Menghapus baris return yang ganda
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        // Perbaikan: hashFile diganti menjadi hasFile
        if ($request->hasFile('gambar')) {
            $old = public_path('uploads/slider/' . $slider->gambar);
            if (File::exists($old)) {
                File::delete($old);
            }

            $file = $request->file('gambar');
            // Perbaikan: Cara penamaan file baru agar tidak error
            $namafile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/slider'), $namafile);
            $slider->gambar = $namafile;
        }

        $slider->judul  = $request->judul;
        $slider->posisi = $request->posisi;
        $slider->status = $request->status;
        $slider->urutan = $request->urutan;
        $slider->save();
        
        // Perbaikan: route('slider') diganti menjadi route('slider.index')
        return redirect()->route('slider.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Perbaikan: S-besar pada Slider untuk konsistensi Model
        $slider = Slider::findOrFail($id);

        $path = public_path('uploads/slider/' . $slider->gambar);

        if (File::exists($path)) {
            File::delete($path);
        }
        
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Data berhasil dihapus');
    }
}