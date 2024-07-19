<?php

namespace App\Http\Controllers;

use App\Models\Teater;
use Illuminate\Http\Request;

class TeaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $teaters = Teater::all();
       return view('teater.index', compact('teaters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teater.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'show_date' => 'required|date',
            'gambar' => 'required', // validasi untuk file gambar
        ]);
    
        // Ambil data dari request
        $title = $request->input('title');
        $description = $request->input('description');
        $show_date = $request->input('show_date');
        $gambar = $request->file('gambar');
    
        // Simpan gambar ke dalam folder 'gambar' di dalam folder 'public'
        $gambar->move(public_path('storage/judul'), $gambar->getClientOriginalName());

        // Buat entry baru di database menggunakan model Teater atau model yang sesuai
        $teater = new Teater();
        $teater->title = $title;
        $teater->description = $description;
        $teater->show_date = $show_date;
        $teater->gambar = $gambar->getClientOriginalName();; // Simpan nama file gambar ke dalam kolom 'gambar'
        $teater->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('teater.index')->with('success', 'Theater Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teater $teater)
    {
        return view('teater.show', compact('teater'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teater $teater)
    {
        return view('teater.edit', compact('teater'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teater $teater)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'show_date' => 'required|date',
            'gambar' => 'required',
        ]);

        $teater->update($request->all());
        return redirect()->route('teater.index')->with('success', 'Theater Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teater $teater)
    {
        $teater->delete();

        return redirect()->route('teater.index')->with('success', 'Theater Deleted Successfully');
    }
}
