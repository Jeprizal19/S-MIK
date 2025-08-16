<?php

namespace App\Http\Controllers;

use App\Models\Mhs;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mhs = Mhs::all();
        return view('mhs.mhs', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mhs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|string|max:50',
            'nama_mhs' => 'required|string|max:50',
            'program_studi' => 'required|string|max:50'
        ]);
        Mhs::create($request->all());
        // Mhs::create([
        //     'npm' => $request->npm,
        //     'nama_mhs' => $request->nama_mhs,
        //     'program_studi' => $request->program_studi
        // ]);

        return redirect()->route('mhs.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
