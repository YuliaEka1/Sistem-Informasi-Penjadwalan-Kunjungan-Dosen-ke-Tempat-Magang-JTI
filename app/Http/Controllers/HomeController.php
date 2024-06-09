<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Penjadwalan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;

        if ($user->role == 'admin') {
            return $this->admin();
        } elseif ($user->role == 'user') {
            return $this->user();
        }

        $totalMhs =  User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalIndustri = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->count();
        return view('home', compact('user', 'totalMhs', 'totalDosen', 'totalIndustri'));
    }

    function admin()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;
        $totalMhs =  User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalIndustri = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->count();
        return view('home', compact('user', 'totalMhs', 'totalDosen', 'totalIndustri'));
    }

    function dosen()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;

        $totalMhs =  User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalIndustri = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->count();
        return view('home', compact('user', 'totalMhs', 'totalDosen', 'totalIndustri'));
    }
    function mahasiswa()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;

        $totalMhs =  User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalIndustri = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->count();
        return view('home', compact('user', 'totalMhs', 'totalDosen', 'totalIndustri'));
    }
    function industri()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;

        $totalMhs =  User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalIndustri = Penjadwalan::whereHas('konfirmasi', function ($query) {
            $query->where('status', 'diterima');
        })->count();
        return view('home', compact('user', 'totalMhs', 'totalDosen', 'totalIndustri'));
    }
}
