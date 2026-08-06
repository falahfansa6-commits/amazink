<?php

namespace App\Http\Controllers;

use App\Models\Produk1;

class Produk1Controller extends Controller
{
    public function index()
    {
        $produk1 = Produk1::orderBy('urutan')->get();

        return view('produk1', compact('produk1'));
    }
}