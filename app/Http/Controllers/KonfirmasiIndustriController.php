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
        $penjadwalan = Penjadwalan::with('mahasiswa')->get();
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
            'konfirmasi_perubahan' => $request->konfirmasi_perubahan,
        ]);
    
        return redirect()->route('konfirmasiIndustri')->with('success', 'Status konfirmasi berhasil diperbarui.');
    }

    // File: KonfirmasiIndustriController.php

    public function simpanData(Request $request)
{
    $request->validate([
        'penjadwalan_id' => 'required',
        'konfirmasi_perubahan' => 'required',
    ]);

    // Cari entri dengan penjadwalan_id yang sama dalam database
    $konfirmasiIndustri = KonfirmasiIndustri::where('penjadwalan_id', $request->penjadwalan_id)->first();

    // Jika ada entri dengan penjadwalan_id yang sama
    if ($konfirmasiIndustri) {
        // Bandingkan nilai konfirmasi_perubahan yang ada di database dengan yang baru
        if ($konfirmasiIndustri->konfirmasi_perubahan != $request->konfirmasi_perubahan) {
            // Jika berbeda, lakukan pembaruan
            $konfirmasiIndustri->update([
                'konfirmasi_perubahan' => $request->konfirmasi_perubahan,
            ]);
        }
    } else {
        // Jika tidak ada entri dengan penjadwalan_id yang sama, buat entri baru
        KonfirmasiIndustri::create([
            'penjadwalan_id' => $request->penjadwalan_id,
            'status' => 'diterima',
            'konfirmasi_perubahan' => $request->konfirmasi_perubahan,
        ]);
    }

    return redirect()->route('konfirmasiIndustri');
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
