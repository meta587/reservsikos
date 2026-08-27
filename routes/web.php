<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PembayaranController;




// Halaman awal
Route::get('/', function () {
    return redirect()->route('admin.login');
});




Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Menampilkan halaman login
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');


        // Proses login
        Route::post('/login', [AdminController::class, 'login'])
            ->name('login.process');


        // Logout
        Route::post('/logout', [AdminController::class, 'logout'])
            ->name('logout');

        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');

        Route::get('/profil', [ProfilController::class, 'index'])
            ->name('profil');

        Route::post('/profil', [ProfilController::class, 'save'])
            ->name('profil.save');

        Route::resource('administrator', AdminController::class)
            ->names('administrator');

        Route::resource('kamar', KamarController::class)
            ->names('kamar');

        Route::resource('penghuni', PenghuniController::class)
            ->names('penghuni');
        

        Route::resource('reservasi', ReservasiController::class)
            ->names('reservasi');

        Route::resource('pembayaran', PembayaranController::class)
            ->names('pembayaran');
            
        Route::resource('reservasi', ReservasiController::class)
            ->names('reservasi');

    });