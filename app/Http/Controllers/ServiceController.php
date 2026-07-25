<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('urutan','ASC')->get();

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'judul'=>'required|max:35',

            'isi'=>'required|max:250',

            'urutan'=>'required|integer'

        ]);

        Service::create([

            'judul'=>$request->judul,

            'isi'=>$request->isi,

            'urutan'=>$request->urutan

        ]);

        return redirect()
        ->route('service.index')
        ->with('success','Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        $request->validate([

            'judul'=>'required|max:35',

            'isi'=>'required|max:250',

            'urutan'=>'required|integer'

        ]);

        $service->update([

            'judul'=>$request->judul,

            'isi'=>$request->isi,

            'urutan'=>$request->urutan

        ]);

        return redirect()
        ->route('service.index')
        ->with('success','Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        $service->delete();

        return redirect()
        ->route('service.index')
        ->with('success','Data berhasil dihapus');

    }
}