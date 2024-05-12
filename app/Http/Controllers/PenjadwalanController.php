<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon; // Import Carbon untuk manajemen tanggal
use App\Models\Penjadwalan;
use App\Models\KonfirmasiIndustri;



class PenjadwalanController extends Controller
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
    return view('penjadwalan.penjadwalan', compact('mahasiswaDirekomendasikan', 'scheduledData'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('penjadwalan.createPenjadwalan');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
    // Fungsi untuk melakukan penjadwalan, bisa ditempatkan di sini atau di model
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

    public function simpanData(Request $request)
{
    $tanggalKunjungans = $request->input('tanggal_kunjungan');
    $mahasiswaIds = $request->input('mahasiswa_id');

    if ($tanggalKunjungans && $mahasiswaIds) {
        foreach ($mahasiswaIds as $index => $mahasiswaId) {
            // Periksa apakah entri penjadwalan sudah ada untuk mahasiswa yang bersangkutan
            $penjadwalan = Penjadwalan::where('mahasiswa_id', $mahasiswaId)->first();

            if ($penjadwalan) {
                // Jika entri sudah ada, perbarui tanggal kunjungan
                $penjadwalan->tanggal_kunjungan = $tanggalKunjungans[$index];
                $penjadwalan->save();
            } else {
                // Jika entri belum ada, buat entri baru
                $penjadwalanBaru = new Penjadwalan();
                $penjadwalanBaru->mahasiswa_id = $mahasiswaId;
                $penjadwalanBaru->tanggal_kunjungan = $tanggalKunjungans[$index];
                $penjadwalanBaru->save();
            }
        }
        
        return redirect()->route('penjadwalan')->with('success', 'Data berhasil disimpan.')->with('tanggal_kunjungan', $tanggalKunjungans);
    } else {
        return redirect()->back()->with('error', 'Data tidak tersedia atau tidak lengkap.');
    }
}

public function laporan()
{
    // Ambil semua data penjadwalan yang terkait dengan konfirmasi industri yang memiliki status "diterima"
    $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
        $query->where('status', 'diterima');
    })->get();

    return view('Penjadwalan.laporanPenjadwalan', compact('penjadwalan'));
}

public function cetakPenjadwalan()
{
    $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
        $query->where('status', 'diterima');
    })->get();

    return view('Penjadwalan.cetakPenjadwalan', compact('penjadwalan'));
}


}
