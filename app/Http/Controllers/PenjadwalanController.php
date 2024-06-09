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

    public function search(Request $request)
    {
        $query = Mahasiswa::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $subQuery = $query
                ->join('dosen', 'mahasiswa.dosen_id', 'dosen.id')
                ->where(function ($q) use ($search) {
                    $q->where('mahasiswa.nama_mhs', 'like', '%' . $search . '%')
                        ->orWhere('mahasiswa.nama_industri', 'like', '%' . $search . '%')
                        ->orWhere('mahasiswa.alamat_industri', 'like', '%' . $search . '%')
                        ->orWhere('mahasiswa.kota', 'like', '%' . $search . '%')
                        ->orWhere('nama_dosen', 'like', '%' . $search . '%');
                })->select('mahasiswa.id');

            $query = Mahasiswa::where('id', $subQuery);
        }

        $penjadwalan = $query->get();
        $scheduledData = $this->doScheduling($penjadwalan);
        $mahasiswaDirekomendasikan = []; // or some logic to get recommended students if needed
        // $scheduledData = []; // or some logic to get scheduled data if needed

        return view('penjadwalan.penjadwalan', compact('penjadwalan', 'mahasiswaDirekomendasikan', 'scheduledData'));
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
        $tanggalKunjungans = $request->input('tanggal_kunjungan');

        foreach ($tanggalKunjungans as $mahasiswaId => $tanggal) {
            $exist = Penjadwalan::where('mahasiswa_id', $mahasiswaId)->first();
            $mhs = Mahasiswa::where('id', $mahasiswaId)->first();

            if ($mhs) {
                if ($exist) {
                    $exist->update([
                        'tanggal_kunjungan' => $tanggal
                    ]);
                } else {
                    Penjadwalan::create([
                        'mahasiswa_id' => $mahasiswaId,
                        'tanggal_rekomendasi' => \Carbon\Carbon::parse($mhs->tgl_akhir)->subDays(7)->format('Y-m-d'),
                        'tanggal_kunjungan' => $tanggal
                    ]);
                }
            }
        }

        return redirect()->route('penjadwalan')->with('tanggal_kunjungan', $tanggalKunjungans);
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

        foreach ($tanggalKunjungans as $mahasiswaId => $tanggal) {
            $exist = Penjadwalan::where('mahasiswa_id', $mahasiswaId)->first();
            $mhs = Mahasiswa::where('id', $mahasiswaId)->first();

            if ($exist) {
                $exist->update([
                    'tanggal_kunjungan' => $tanggal
                ]);
            } else {
                Penjadwalan::create([
                    'mahasiswa_id' => $mahasiswaId,
                    'tanggal_rekomendasi' => $mhs->tanggal_rekomendasi,
                    'tanggal_kunjungan' => $tanggal
                ]);
            }
        }

        return redirect()->route('penjadwalan')->with('tanggal_kunjungan', $tanggalKunjungans);
    }

    public function laporan()
    {
        // Ambil semua data penjadwalan yang terkait dengan konfirmasi industri yang memiliki status "diterima"
        $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->get();

        // dd($penjadwalan);

        return view('Penjadwalan.laporanPenjadwalan', compact('penjadwalan'));
    }

    public function cetakPenjadwalan()
    {
        $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->get();

        return view('Penjadwalan.cetakPenjadwalan', compact('penjadwalan'));
    }

    public function kelompok()
    {
        // Ambil semua data penjadwalan yang terkait dengan konfirmasi industri yang memiliki status "diterima"
        $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->get();

        // Mengelompokkan data berdasarkan kota
        $penjadwalanByCity = $penjadwalan->groupBy('mahasiswa.kota');

        // Membagi setiap kelompok kota menjadi sub-kelompok dengan maksimal 4 item per kelompok
        $groupedPenjadwalan = [];
        foreach ($penjadwalanByCity as $city => $penjadwalan) {
            $chunks = $penjadwalan->chunk(4);
            foreach ($chunks as $chunk) {
                $groupedPenjadwalan[] = $chunk;
            }
        }

        return view('Penjadwalan.kelompokDosen', compact('groupedPenjadwalan'));
    }

    public function cetakKelompok()
    {
        $penjadwalan = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->get();

        // Kelompokkan data berdasarkan kota
        $penjadwalanByCity = $penjadwalan->groupBy('mahasiswa.kota');
        $groupedPenjadwalan = [];
        foreach ($penjadwalanByCity as $city => $penjadwalan) {
            $chunks = $penjadwalan->chunk(4);
            foreach ($chunks as $chunk) {
                $groupedPenjadwalan[] = $chunk;
            }
        }

        // Data untuk view
        $data = [
            'groupedPenjadwalan' => $groupedPenjadwalan,
        ];

        return view('Penjadwalan.cetakKelompok', $data);
    }
}
