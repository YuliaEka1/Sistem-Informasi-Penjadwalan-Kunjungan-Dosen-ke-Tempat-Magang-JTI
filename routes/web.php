<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TempatMagangController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RekomendasiIndustriController;
use App\Http\Controllers\HasilRekomendasiController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\KonfirmasiIndustriController;
use App\Http\Controllers\KonfirmasiDosenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
//Login with google
Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//dosen
Route::get('/dataDosen', [App\Http\Controllers\DosenController::class, 'index'])->name('dataDosen');
Route::get('/createDosen', [App\Http\Controllers\DosenController::class, 'create'])->name('createDosen');
Route::post('/simpanDosen', [App\Http\Controllers\DosenController::class, 'store'])->name('simpanDosen');
Route::get('/editDosen/{id}', [App\Http\Controllers\DosenController::class, 'edit'])->name('editDosen');
Route::post('/updateDosen/{id}', [App\Http\Controllers\DosenController::class, 'update'])->name('updateDosen');
Route::get('/deleteDosen/{id}', [App\Http\Controllers\DosenController::class, 'destroy'])->name('deleteDosen');

//mahasiswa
Route::get('/dataMahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('dataMahasiswa');
Route::get('/createMahasiswa', [App\Http\Controllers\MahasiswaController::class, 'create'])->name('createMahasiswa');
Route::post('/simpanMahasiswa', [App\Http\Controllers\MahasiswaController::class, 'store'])->name('simpanMahasiswa');
Route::get('/editMahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'edit'])->name('editMahasiswa');
Route::post('/updateMahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('updateMahasiswa');
Route::get('/deleteMahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])->name('deleteMahasiswa');

//rekomendasi
Route::get('/rekomendasiIndustri', [RekomendasiIndustriController::class, 'index'])->name('rekomendasiIndustri.index');
Route::post('/rekomendasiIndustri/store', [RekomendasiIndustriController::class, 'store'])->name('rekomendasiIndustri.store');
Route::get('/hasilRekomendasi', [App\Http\Controllers\HasilRekomendasiController::class, 'index'])->name('hasilRekomendasi');


//penjadwalan
Route::get('/penjadwalan', [App\Http\Controllers\PenjadwalanController::class, 'index'])->name('penjadwalan');
Route::get('/penjadwalan/search', [PenjadwalanController::class, 'search'])->name('penjadwalan.search');
Route::post('/simpan-data', [App\Http\Controllers\PenjadwalanController::class, 'simpanData'])->name('simpan-data');
Route::post('/penjadwalan', [App\Http\Controllers\PenjadwalanController::class, 'store'])->name('penjadwalan.store');
Route::get('/laporanPenjadwalan', [PenjadwalanController::class, 'laporan'])->name('laporanPenjadwalan');
Route::get('/cetakPenjadwalan', [App\Http\Controllers\PenjadwalanController::class, 'cetakPenjadwalan'])->name('cetakPenjadwalan');
Route::get('/kelompokDosen', [PenjadwalanController::class, 'kelompok'])->name('kelompokDosen');
Route::get('/cetakKelompok', [App\Http\Controllers\PenjadwalanController::class, 'cetakKelompok'])->name('cetakKelompok');

//konfirmasi industri
Route::get('/konfirmasiIndustri', [App\Http\Controllers\KonfirmasiIndustriController::class, 'index'])->name('konfirmasiIndustri');
Route::get('/konfirmasiIndustri/search', [App\Http\Controllers\KonfirmasiIndustriController::class, 'search'])->name('konfirmasiIndustri.search');
Route::post('/konfirmasiIndustri', [App\Http\Controllers\KonfirmasiIndustriController::class, 'store'])->name('konfirmasiIndustri.store');
Route::post('/konfirmasiIndustri/simpan-data', [App\Http\Controllers\KonfirmasiIndustriController::class, 'simpanData'])->name('konfirmasiIndustri.simpanData');
Route::get('/perubahanIndustri', [KonfirmasiIndustriController::class, 'showPerubahan'])->name('konfirmasiIndustri.perubahan');

//konfirmasi dosen
Route::get('/konfirmasiDosen', [KonfirmasiDosenController::class, 'index'])->name('konfirmasiDosen');
Route::post('/konfirmasiDosen', [KonfirmasiDosenController::class, 'store'])->name('konfirmasiDosen.store');


//role user
Route::get('/admin', [HomeController::class, 'admin'])->middleware('role:admin');
Route::get('/dosen', [HomeController::class, 'dosen'])->middleware('role:dosen');
Route::get('/mahasiswa', [HomeController::class, 'mahasiswa'])->middleware('role:mahasiswa');
Route::get('/industri', [HomeController::class, 'industri'])->middleware('role:industri');