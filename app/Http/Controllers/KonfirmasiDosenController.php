<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonfirmasiIndustri;
use App\Models\KonfirmasiDosen;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class KonfirmasiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $konfirmasiDosen = KonfirmasiDosen::with('konfirmasiIndustri.mahasiswa.dosen')
        ->whereHas('konfirmasiIndustri', function ($query) {
            $query->where('status', 'diterima');
        })->get();

    // Debug: Log the retrieved data
    \Log::info($konfirmasiDosen);

    return view('Konfirmasi.konfirmasiDosen', compact('konfirmasiDosen'));
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
            'konfirmasi_industri_id' => 'required', 
        ]);
    
        // Buat entri baru di tabel KonfirmasiDosen
        KonfirmasiDosen::create([
            'konfirmasi_industri_id' => $request->konfirmasi_industri_id,
            'status' => 'dikonfirmasi', 
        ]);
    
        return redirect()->route('konfirmasiDosen')->with('success', 'Status konfirmasi berhasil diperbarui.');
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
