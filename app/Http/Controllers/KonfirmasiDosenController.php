<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonfirmasiIndustri;
use App\Models\KonfirmasiDosen;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Penjadwalan;

class KonfirmasiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = auth()->user();

    if ($user->role != 'admin') {
        $query = KonfirmasiIndustri::where('status', 'diterima')
            ->join('penjadwalan', 'penjadwalan.id', 'konfirmasi_industri.penjadwalan_id')
            ->join('mahasiswa', 'penjadwalan.mahasiswa_id', 'mahasiswa.id')
            ->join('dosen', 'dosen.id', 'mahasiswa.dosen_id')
            ->where('dosen.user_id', $user->id)
            ->pluck('konfirmasi_industri.id'); // Mengambil semua ID yang sesuai

        $konfirmasiDosen = KonfirmasiIndustri::with('penjadwalan.mahasiswa.dosen')
            ->whereIn('id', $query)
            ->get();
    } else {
        $konfirmasiDosen = KonfirmasiIndustri::with('penjadwalan.mahasiswa.dosen')
            ->where('status', 'diterima')
            ->get();
    }

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
            'penjadwalan_id' => 'required|exists:penjadwalan,id',
        ]);

        KonfirmasiDosen::create([
            'penjadwalan_id' => $request->penjadwalan_id,
            'status_kunjungan' => 'selesai',
        ]);

        return redirect()->route('konfirmasiDosen');
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
