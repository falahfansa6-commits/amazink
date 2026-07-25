<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\OurValue;
use App\Models\OurValueImage;
use App\Models\Service;
use App\Models\Secound;

class BerandaController extends Controller
{
    public function index()
    {
        // Slider
        $sliderBeranda = Slider::where('posisi', 'beranda')
            ->where('status', 1)
            ->orderBy('urutan', 'asc')
            ->get();

        // Our Values
        $ourvalues = OurValue::where('status', 1)
            ->orderBy('urutan', 'asc')
            ->get();

        // Gambar Our Values
        $gambar = OurValueImage::first();

        // Services
        $services = Service::orderBy('urutan', 'asc')->get();

        // Secound (ambil satu data saja)
        $secounds = Secound::first();

        return view('index', compact(
            'sliderBeranda',
            'ourvalues',
            'gambar',
            'services',
            'secounds'
        ));
    }
}