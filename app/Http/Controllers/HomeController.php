<?php

namespace App\Http\Controllers;

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

        return view('home', ['user' => $user]);
    }
    
    function admin(){
        $user = Auth::user();
        $idUser = auth()->user()->id;
        
        return view('home', ['user' => $user]);
    }

    function dosen(){
        $user = Auth::user();
        $idUser = auth()->user()->id;

        return view('home', ['user' => $user]);
    }
    function mahasiswa(){
        $user = Auth::user();
        $idUser = auth()->user()->id;

        return view('home', ['user' => $user]);
    }
    function industri(){
        $user = Auth::user();
        $idUser = auth()->user()->id;

        return view('home', ['user' => $user]);
    }
}
