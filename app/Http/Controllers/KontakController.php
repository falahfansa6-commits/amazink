<?php

namespace App\Http\Controllers;

use App\Models\EmpatKontak;

class KontakController extends Controller
{
    public function index()
    {
        $empatkontaks = EmpatKontak::orderBy('urutan')->get();

        return view('kontak', compact('empatkontaks'));
    }
}