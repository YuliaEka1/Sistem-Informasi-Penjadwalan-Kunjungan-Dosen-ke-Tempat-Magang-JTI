<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtDosen = Dosen::all();
        // $dtDosen = Dosen::paginate(2);
        return view('Dosen.dataDosen', compact('dtDosen'));
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
        //dd($request->all());
        Dosen::create([
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
            'jumlah_bimbingan' => $request->jumlah_bimbingan,
            'no_hp' => $request->no_hp,
        ]);
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findorfail($id); // Misalnya, Anda menggunakan Eloquent untuk mengambil data dosen
        $dosen->update($request->all());
        return redirect('dataDosen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findorfail($id);
        $dosen->delete();
        return back();
    }
}
