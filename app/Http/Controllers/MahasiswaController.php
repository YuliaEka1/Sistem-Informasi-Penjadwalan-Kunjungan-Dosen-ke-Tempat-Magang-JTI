<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtMahasiswa = Mahasiswa::with('dosen')->get();// tambah with dan get
        $dosen = Dosen::all();
        return view('Mahasiswa.dataMahasiswa', compact('dtMahasiswa', 'dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('Mahasiswa.createMahasiswa', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'nama_mhs' => $request->nama_mhs,
            'nama_mhs_2' => $request->nama_mhs_2,
            'nama_mhs_3' => $request->nama_mhs_3,
            'nim' => $request->nim,
            'nim_2' => $request->nim_2,
            'nim_3' => $request->nim_3,
            'kelas' => $request->kelas,
            'durasi_magang' => $request->durasi_magang,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'kategori_magang' => $request->kategori_magang,
            'jenis_magang' => $request->jenis_magang,
            'nama_industri' => $request->nama_industri,
            'no_pemlap' => $request->no_pemlap,
            'dosen_id' => $request->dosen_id,
            'no_mahasiswa' => $request->no_mahasiswa,
            'alamat_industri' => $request->alamat_industri,
            'kota' => $request->kota,
        ]);
        return redirect('dataMahasiswa');
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
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::findorfail($id);
        return view('Mahasiswa.editMahasiswa', compact('mahasiswa', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data mhs
        $mahasiswa->update($request->all());
        return redirect('dataMahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findorfail($id);
        $mahasiswa->delete();
        return back();
    }
}
