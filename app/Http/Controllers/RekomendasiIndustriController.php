<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\RekomendasiIndustri;
use App\Models\Dosen;

class RekomendasiIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('dosen')->paginate(10); // Mengambil semua data mahasiswa dengan data dosen terkait
        $dosen = Dosen::all();
       
        return view('RekomendasiIndustri.rekomendasiIndustri', compact('mahasiswa', 'dosen')); // Kirim data mahasiswa ke halaman rekomendasi
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
    // Menghitung nilai rekomendasi berdasarkan pilihan yang diberikan
    $nilai_rekomendasi = $request->kota +
                          $request->dosen +
                          $request->dana +
                          $request->kunjungan;

    // Tentukan status berdasarkan nilai rekomendasi
    $status = ($nilai_rekomendasi >= 9) ? 'Direkomendasikan' : 'Tidak Direkomendasikan';

    // Simpan rekomendasi ke dalam database
    $rekomendasi = new RekomendasiIndustri;
    $rekomendasi->mahasiswa_id = $request->mahasiswa_id;
    $rekomendasi->kota_score = $request->kota;
    $rekomendasi->dosen_score = $request->dosen;
    $rekomendasi->dana_kunjungan_score = $request->dana;
    $rekomendasi->kunjungan_score = $request->kunjungan;
    $rekomendasi->total_score = $nilai_rekomendasi;
    $rekomendasi->status = $status;
    $rekomendasi->save();

    // Redirect kembali ke halaman rekomendasiIndustri setelah penyimpanan
    return redirect('rekomendasiIndustri');
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
