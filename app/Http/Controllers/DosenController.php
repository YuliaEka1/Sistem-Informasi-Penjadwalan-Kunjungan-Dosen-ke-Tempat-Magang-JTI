<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtDosen = Dosen::all();
        $query = Dosen::query();

        $user = auth()->user();
        if ($user->role === "dosen") {
            $query->where('user_id', $user->id);
        }
        $dtDosen = $query->paginate(10);
        // $dtDosen = Dosen::paginate(2);
        return view('Dosen.dataDosen', compact('dtDosen'));
    }
    public function index2()
    {
        $dtDosen = Dosen::all();
        $query = Dosen::query();

        $user = auth()->user();
        if ($user->role === "dosen") {
            $query->where('user_id', $user->id);
        }
        $dtDosen = $query->paginate(10);

        return view('Dosen.dataDosen2', compact('dtDosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dosen.createDosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nama_dosen' => 'required',
            'nip' => 'required',
            'jumlah_bimbingan' => 'required',
            'no_hp' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $request->email,
                'name' => $request->nama_dosen,
                'password' => bcrypt($request->password),
                'role' => 'dosen'
            ]);

            if (!$user) {
                DB::rollBack();
                return redirect()->back()->withInput()->withErrors(['email' => 'User gagal dibuat']);
            }
            Dosen::create([
                'user_id' => $user->id,
                'nama_dosen' => $request->nama_dosen,
                'nip' => $request->nip,
                'jumlah_bimbingan' => $request->jumlah_bimbingan,
                'no_hp' => $request->no_hp,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            
            return redirect()->back()->withInput();
        }

        return redirect('dataDosen');
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

        $dosen = Dosen::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data dosen
        return view('Dosen.editDosen', compact('dosen'));
    }
    public function edit2(string $id)
    {

        $dosen = Dosen::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data dosen
        return view('Dosen.editDosen2', compact('dosen'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data dosen
        $dosen->update($request->all());
        return redirect('dataDosen');
    }
    public function update2(Request $request, string $id)
    {
        $dosen = Dosen::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data dosen
        $dosen->update($request->all());
        return redirect('dataDosen2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //ganti destroy
{
    try {
        DB::beginTransaction();

        $dosen = Dosen::findOrFail($id);
        $user = $dosen->user;
        
        $dosen->delete();

       
        if ($user) {
            $user->delete();
        }

        DB::commit();
    } catch (\Throwable $th) {
        DB::rollBack();
        
        return back()->withErrors(['message' => 'Gagal menghapus data dosen']);
    }

    return back();
}
}
