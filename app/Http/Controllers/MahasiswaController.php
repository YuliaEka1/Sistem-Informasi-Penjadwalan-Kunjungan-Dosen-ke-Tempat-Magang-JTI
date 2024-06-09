<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $dosen = Dosen::all();
        $query = Mahasiswa::orderBy('created_at', 'desc');
        if ($user->role == "mahasiswa") {
            $query->where('user_id', $user->id);
        } else if ($user->role == "dosen") {
            $subQuery = $query;
            $subQuery = $subQuery->join('dosen', 'dosen.id', 'mahasiswa.dosen_id')->where('dosen.user_id', $user->id)->select('mahasiswa.id');
            $query->where('id', $subQuery);
        }
        $dtMahasiswa = $query->paginate(10);
        return view('Mahasiswa.dataMahasiswa', compact('dtMahasiswa', 'dosen'));
    }

    public function index2()
    {
        $user = auth()->user();
        $dosen = Dosen::all();
        $query = Mahasiswa::orderBy('created_at', 'desc');
        if ($user->role == "mahasiswa") {
            $query->where('user_id', $user->id);
        } else if ($user->role == "dosen") {
            $subQuery = $query;
            $subQuery = $subQuery->join('dosen', 'dosen.id', 'mahasiswa.dosen_id')->where('dosen.user_id', $user->id)->select('mahasiswa.id');
            $query->where('id', $subQuery);
        }
        $dtMahasiswa = $query->paginate(10);
        return view('Mahasiswa.dataMahasiswa2', compact('dtMahasiswa', 'dosen'));
    }

    public function index3()
    {
        $dtMahasiswa = Mahasiswa::with('dosen')->get();// tambah with dan get
        $dosen = Dosen::all();
        $dtMahasiswa = Mahasiswa::paginate();
        return view('Mahasiswa.dtMahasiswa', compact('dtMahasiswa', 'dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('Mahasiswa.createMahasiswa', compact('dosen'));
    }
    public function create2()
    {
        $dosen = Dosen::all();
        return view('Mahasiswa.createMahasiswa2', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nama_mhs' => 'required',
            'nama_mhs_2' => 'required',
            'nama_mhs_3' => 'required',
            'nim' => 'required',
            'nim_2' => 'required',
            'nim_3' => 'required',
            'durasi_magang' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'kategori_magang' => 'required',
            'jenis_magang' => 'required',
            'nama_industri' => 'required',
            'no_pemlap' => 'required',
            'dosen_id' => 'required',
            'no_mahasiswa' => 'required',
            'alamat_industri' => 'required',
            'kota' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $request->email,
                'name' => $request->nama_mhs,
                'password' => bcrypt($request->password),
                'role' => 'mahasiswa'
            ]);

            if (!$user) {
                DB::rollBack();
                return redirect()->back()->withInput();
            }

            Mahasiswa::create([
                'user_id' => $user->id,
                'nama_mhs' => $request->nama_mhs,
                'nama_mhs_2' => $request->nama_mhs_2,
                'nama_mhs_3' => $request->nama_mhs_3,
                'nim' => $request->nim,
                'nim_2' => $request->nim_2,
                'nim_3' => $request->nim_3,
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
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput();
        }
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
    public function edit2(string $id)
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::findorfail($id);
        return view('Mahasiswa.editMahasiswa2', compact('mahasiswa', 'dosen'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findorfail($id); 
        $mahasiswa->update($request->all());
        return redirect('dataMahasiswa');
    }
    public function update2(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findorfail($id); 
        $mahasiswa->update($request->all());
        return redirect('dataMahasiswa2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        DB::beginTransaction();

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        DB::commit();
    } catch (\Throwable $th) {
        DB::rollBack();
        
        return back()->withErrors(['message' => 'Gagal menghapus data mahasiswa']);
    }

    return back();
}


    public function tambahIndustri(Mahasiswa $mhs)
    {
        return view('mahasiswa.tambah-industri', compact('mhs'));
    }

    public function storeIndustri(Mahasiswa $mhs, Request $request)
    {
        $request->validate([
            'nama_industri' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->nama_industri,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'industri'
            ]);
            if (!$user) return redirect()->back()->withInput();
            $mhs->update([
                'industri_id' => $user->id,
                'nama_industri' => $request->nama_industri,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput();
        }

        return redirect('dataMahasiswa');
    }

    public function showRegistrationForm()
{
    $dosen = Dosen::all();
    return view('auth.registerMhs', compact('dosen'));
}

//untuk register mhs di halaman register
public function store2(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
        'nama_mhs' => 'required',
        'nama_mhs_2' => 'required',
        'nama_mhs_3' => 'required',
        'nim' => 'required',
        'nim_2' => 'required',
        'nim_3' => 'required',
        'durasi_magang' => 'required',
        'tgl_awal' => 'required',
        'tgl_akhir' => 'required',
        'kategori_magang' => 'required',
        'jenis_magang' => 'required',
        'nama_industri' => 'required',
        'no_pemlap' => 'required',
        'no_mahasiswa' => 'required',
        'alamat_industri' => 'required',
        'kota' => 'required',
    ]);

    try {
        DB::beginTransaction();
        $user = User::create([
            'email' => $request->email,
            'name' => $request->nama_mhs,
            'password' => bcrypt($request->password),
            'role' => 'mahasiswa'
        ]);

        if (!$user) {
            DB::rollBack();
            return redirect()->back()->withInput();
        }

        // Memeriksa apakah dosen_id tidak kosong
        $dosen_id = $request->has('dosen_id') ? $request->dosen_id : null;

        Mahasiswa::create([
            'user_id' => $user->id,
            'nama_mhs' => $request->nama_mhs,
            'nama_mhs_2' => $request->nama_mhs_2,
            'nama_mhs_3' => $request->nama_mhs_3,
            'nim' => $request->nim,
            'nim_2' => $request->nim_2,
            'nim_3' => $request->nim_3,
            'durasi_magang' => $request->durasi_magang,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'kategori_magang' => $request->kategori_magang,
            'jenis_magang' => $request->jenis_magang,
            'nama_industri' => $request->nama_industri,
            'no_pemlap' => $request->no_pemlap,
            'dosen_id' => $dosen_id, // Menggunakan nilai dosen_id yang telah diperiksa
            'no_mahasiswa' => $request->no_mahasiswa,
            'alamat_industri' => $request->alamat_industri,
            'kota' => $request->kota,
        ]);
        DB::commit();
    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->withInput();
    }

    if (Auth::check()) {
        return redirect('home');
    } else {
        return redirect('login');
    }
}

}
