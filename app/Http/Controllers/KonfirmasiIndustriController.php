<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use App\Models\KonfirmasiIndustri;

class KonfirmasiIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjadwalan = Penjadwalan::all();
        return view('Konfirmasi.konfirmasiIndustri', compact('penjadwalan'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penjadwalan_id' => 'required', // Pastikan Anda memiliki validasi untuk id penjadwalan
        ]);
    
        // Buat entri baru di tabel KonfirmasiIndustri
        KonfirmasiIndustri::create([
            'penjadwalan_id' => $request->penjadwalan_id,
            'status' => 'diterima', // Tetapkan status ke "diterima"
        ]);
    
        return redirect()->route('konfirmasiIndustri')->with('success', 'Status konfirmasi berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);
        return view('konfirmasiIndustri.show', compact('penjadwalan'));
    
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
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
