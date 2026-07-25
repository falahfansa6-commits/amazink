<?php

namespace App\Http\Controllers;

use App\Models\EmpatKontak;

class WebsiteKontakController extends Controller
{
    public function index()
    {
        $email = EmpatKontak::where('urutan', 1)->first();
        $kantor = EmpatKontak::where('urutan', 2)->first();
        $telepon = EmpatKontak::where('urutan', 3)->first();
        $whatsapp = EmpatKontak::where('urutan', 4)->first();

        return view('kontak', compact(
            'email',
            'kantor',
            'telepon',
            'whatsapp'
        ));
    }
}