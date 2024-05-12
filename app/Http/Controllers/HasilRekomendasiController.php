<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Carbon\Carbon; // Import Carbon untuk manajemen tanggal


class HasilRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan data mahasiswa yang direkomendasikan
        $mahasiswaDirekomendasikan = Mahasiswa::whereHas('rekomendasi', function ($query) {
            $query->where('status', 'Direkomendasikan');
        })->get();
    
        // Panggil fungsi untuk penjadwalan dari model atau kontroler
        $scheduledData = $this->doScheduling($mahasiswaDirekomendasikan);
    
        // Menampilkan view dengan variabel $mahasiswaDirekomendasikan
        return view('RekomendasiIndustri.hasilRekomendasi', compact('mahasiswaDirekomendasikan', 'scheduledData'));
    }

    private function doScheduling($mahasiswaDirekomendasikan)
    {
        // Inisialisasi array untuk menyimpan data yang telah dikelompokkan
        $groupedData = [];

        // Lakukan pengelompokkan data berdasarkan kota dan tanggal akhir
        foreach ($mahasiswaDirekomendasikan as $mahasiswa) {
            $kota = $mahasiswa->kota;
            $tglAkhir = $mahasiswa->tgl_akhir;

            // Buat array baru untuk setiap kota jika belum ada
            if (!isset($groupedData[$kota])) {
                $groupedData[$kota] = [];
            }

            // Buat array baru untuk setiap tanggal akhir di bawah kota
            if (!isset($groupedData[$kota][$tglAkhir])) {
                $groupedData[$kota][$tglAkhir] = [];
            }

            // Tambahkan data mahasiswa ke dalam array yang sesuai dengan kota dan tanggal akhirnya
            $groupedData[$kota][$tglAkhir][] = $mahasiswa;
        }

        // Urutkan data berdasarkan nama kota dan tanggal akhir
        ksort($groupedData); // Urutkan berdasarkan nama kota
        foreach ($groupedData as $kota => &$tanggal) {
            ksort($tanggal); // Urutkan data tanggal akhir
        }

    // Kembalikan data yang telah dikelompokkan
    return $groupedData;
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
        //
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
