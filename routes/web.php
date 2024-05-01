<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TempatMagangController;


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

//industri
Route::get('/tempatMagang', [App\Http\Controllers\TempatMagangController::class, 'index'])->name('tempatMagang');
