<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('urutan')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'urutan' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'judul',
            'isi',
            'urutan'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'urutan' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'judul',
            'isi',
            'urutan'
        ]);

        if ($request->hasFile('gambar')) {

            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}