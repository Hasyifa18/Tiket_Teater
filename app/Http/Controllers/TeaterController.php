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
            'title' => 'required',
            'description' => 'nullable',
            'show_date' => 'required|date',
        ]);

        Teater::create($request->all());
        return redirect()->route('teater.index')->with('success','Theater Created Successfully');
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
