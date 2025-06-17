<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LokasiController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => ['auth']], function()
    {
        Route::resource('pengguna', UserController::class);
        Route::resource('jabatan', JabatanController::class);
        Route::get('get-jabatan', [JabatanController::class, 'getJabatan'])->name('get.jabatan');

        Route::resource('lokasi', LokasiController::class);
        Route::get('get-lokasi', [LokasiController::class, 'getlokasi'])->name('get.lokasi');
    });
